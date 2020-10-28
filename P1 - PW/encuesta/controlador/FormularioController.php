<?php
session_start();
require_once ('modelo/Bd.php');
require_once ('modelo/Encuesta.php');
require_once ('modelo/Respuesta.php');

//Creamos el objeto de nuestra bd
$basedatos = new Bd();
$basedatos->conectar();

if(isset($_SESSION['rol']) && !empty($_SESSION['rol']) && $_SESSION['rol'] == 2)
{
	if(isset($_POST) && !empty($_POST)) 
	{

		if(!empty($_POST["edad"]) && !empty($_POST["sexo"]) && !empty($_POST["curso_alto"]) && !empty($_POST["curso_bajo"]) && !empty($_POST["num_matriculas"]) && !empty($_POST["num_examenes"]) && !empty($_POST["interes"]) && !empty($_POST["tutorias"]) && !empty($_POST["dificultad"]) && !empty($_POST["calificacion"]) && !empty($_POST["asistencia"]) && !empty($_POST["prof-1-1"]) && !empty($_POST["prof-1-2"]) && !empty($_POST["prof-1-3"]) && !empty($_POST["prof-1-4"]))
		{
			//Formamos los ids juntando los checkbox
			$idTitulacion = "";
			for($i = 0; $i < 4; $i++)
			{
				if(!empty($_POST["ti-".$i]))
					$_POST["ti-".$i] == 10 ? $idTitulacion .= "0" : $idTitulacion .= $_POST["ti-".$i];
				else
					$_SESSION["error"] = "Por favor, rellene los campos de la titulacion";
			}
			
			$idAsignatura = "";
			for($i = 0; $i < 3; $i++)
			{
				if(!empty($_POST["as-".$i]))
					$_POST["as-".$i] == 10 ? $idAsignatura .= "0" : $idAsignatura .= $_POST["as-".$i];
				else
					$_SESSION["error"] = "Por favor, rellene los campos de la asignatura";
			}
			
			$grupo = "";
			for($i = 0; $i < 2; $i++)
			{
				if(!empty($_POST["gr-".$i]))
					$_POST["gr-".$i] == 10 ? $grupo .= "0" : $grupo .= $_POST["gr-".$i];
				else
					$_SESSION["error"] = "Por favor, rellene los campos del grupo";
			}

			//Creamos el objeto del modelo encuesta con los datos personales
			$encuesta = new Encuesta($idAsignatura, $idTitulacion, $grupo, $_POST["edad"], $_POST["sexo"], $_POST["curso_alto"], $_POST["curso_bajo"], $_POST["num_matriculas"], $_POST["num_examenes"], $_POST["interes"], $_POST["tutorias"], $_POST["dificultad"], $_POST["calificacion"], $_POST["asistencia"]);

			if(!isset($_SESSION["error"]))
			{
				$insercion1 = $encuesta->insertar();

				$numPreguntas = mysqli_num_rows($basedatos->consultar("SELECT id FROM preguntas"));
			
				//Para cada uno de los profesores
				for($j = 1; $j <= 3; ++$j)
				{
					//Sacamos el codigo de cada uno de los profesores
					$codigoProfesor = "";
					for($i = 1; $i <= 4; ++$i)
					{
						if(!empty($_POST["prof-".$j."-".$i]))
						{
							$_POST["prof-".$j."-".$i] == 10 ? $codigoProfesor .= "0" : $codigoProfesor .= $_POST["prof-".$j."-".$i];
						}
					}

					//Si tenemos un codigo de profesor activo...
					if($codigoProfesor != "" && strlen($codigoProfesor) == 4)
					{
						//Para cada pregunta hacemos una inserccion en respuestas
						for($i = 1; $i <= $numPreguntas; ++$i)
						{	
							//Creamos las variables de cada pregunta para que sea más cómodo
							if(!empty($_POST["pr-".$i]))
							{
								//Operador ternario para el 6
								$respuesta = new Respuesta($encuesta->getId(),$i,($_POST['pr-'.$i] == 6 ? '0' : $_POST['pr-'.$i]),$codigoProfesor);
								$insercion2 = $respuesta->insertar();
							}
							else
							{
								$_SESSION["error"] = "Por favor rellene la pregunta " . $i;
							}
						}
					}
				}

				//Si las consultas se han insertado correctamente se crea un mensaje de éxito
				if($insercion1 && $insercion2)
					$_SESSION["exito"] = "Su encuesta ha sido recibida con éxito";

				//Desconectamos de la base de datos
				$basedatos->desconectar();
			}
		}
		else
		{
			$_SESSION["error"] = "Rellene los campos de informacion personal y el codigo del profesor 1";
		}

		//Volvemos al formulario para mostrar los posibles mensajes de error
		header("Location: index");
	} 
	else 
	{	

		//Sacamos las preguntas de la base de datos para mostrarlas
		$consulta = $basedatos->consultar("SELECT * FROM preguntas ORDER BY tipo,id asc");
		$preguntas = array();

		while($pregunta = mysqli_fetch_array($consulta))
		{
			array_push($preguntas,$pregunta);
		}

		//Pasamos las preguntas a la vista mediante una variable de sesion
		$_SESSION["preguntas"] = $preguntas;
		$titulos = array(1 => "Cumplimiento de las obligaciones docentes (del encargo docente)", 2 => "Cumplimiento de la Planificación", 3 => "Metodología docente", 4 => "Competencias docentes desarrolladas por el/la profesor/a", 5 => "Sistemas de evaluación");
		$_SESSION["titulos"] = $titulos;

		//LLamamos a la vista
		require('vista/index.php');
	}
}
else
{
	$_SESSION['error'] = "Debe acceder como estudiante a la encuesta";
	header('Location: login');
}
?>