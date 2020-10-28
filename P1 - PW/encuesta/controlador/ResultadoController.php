<?php
session_start();
require('modelo/Bd.php');

//Creamos el objeto de nuestra bd y realizamos la conexion

$basedatos = new Bd();
$basedatos->conectar();

//Recibo la asignatura a mostrar
if(isset($_SESSION['rol']) && !empty($_SESSION['rol']) && $_SESSION['rol'] == 1)
{
	if(isset($_POST['id']) && !empty($_POST['id'])) 
	{
		if(isset($_POST['idProfesor']) && !empty($_POST['idProfesor']))
		{
			$idProfesor = $_POST['idProfesor'];
			$idAsignatura = $_POST['id'];
			
			$_SESSION['idas'] = $idAsignatura;
			$_SESSION['idprof'] = $idProfesor;

	        $consulta = $basedatos->consultar("SELECT * FROM profesores WHERE id = $idProfesor");
	        $prof = mysqli_fetch_array($consulta);

	        $consulta = $basedatos->consultar("SELECT * FROM asignaturas WHERE id = $idAsignatura");
	        $asig = mysqli_fetch_array($consulta);

	        $consulta = $basedatos->consultar("SELECT nombre FROM departamento WHERE id = (SELECT idDepartamento FROM asignaturas WHERE id = $idAsignatura)");
	        $dep = mysqli_fetch_array($consulta);

	        $consulta = $basedatos->consultar("SELECT nombre FROM titulacion WHERE id = (SELECT idTitulacion FROM asignaturas WHERE id = $idAsignatura)");
	        $tit = mysqli_fetch_array($consulta);

	        $consulta = $basedatos->consultar("SELECT grupo FROM encuestas WHERE idAsignatura = $idAsignatura");
	        $g = mysqli_fetch_array($consulta);

	        $consulta = $basedatos->consultar("SELECT * FROM preguntas ORDER BY id ASC");
	        $preg = mysqli_fetch_all($consulta);

	        $consulta = $basedatos->consultar("SELECT idPregunta, count(*) AS n, AVG(respuesta) AS m, sqrt((sum(power(respuesta,2))/count(respuesta))-power(avg(respuesta),2)) FROM respuestas WHERE idProfesor = (SELECT idReal from profesores WHERE id =$idProfesor) GROUP BY idPregunta ORDER BY idPregunta ASC");
	        $r = mysqli_fetch_all($consulta);
	        $numRespuestas = $consulta->num_rows;

	        echo json_encode(["OK" => 1, "prof" => $prof, "asig" => $asig, "dep" => $dep, "tit" => $tit, "g" => $g, "Preg" => $preg, "r" => $r, "numRespuestas" => $numRespuestas]);
	        $basedatos->desconectar();
		}
		else
		{
			$idAsignatura = $_POST['id'];
			//Consultamos mediante subconsulta los profesores que imparten la asignatura.
			$consulta = $basedatos->consultar("SELECT * FROM profesores WHERE id IN (SELECT idProfesor FROM asignaturaprofesores WHERE idAsignatura =" . $idAsignatura . ")");
			//Añadimos los profesores a un array para pasarlos.
			$profesores = array();
			while($profesor = mysqli_fetch_array($consulta))
			{
				array_push($profesores,$profesor);
			}
			//Pasamos los datos al ajax
			echo json_encode(["OK" => 1, "data" => $profesores]);
			$basedatos->desconectar();
		}
	}
	else 
	{
		//Cargamos las asignaturas, luego por ajax cargamos los profesores de las asignaturas
		
		$consulta = $basedatos->consultar("SELECT id,nombre FROM asignaturas");
		$asignaturas = array();

		//Añadimos las asignaturas al array

		while($asignatura = mysqli_fetch_assoc($consulta))
		{
			array_push($asignaturas,$asignatura);
		}
		
		//Creamos una variable de sesion que contiene las asignaturas

		$_SESSION['asignaturas'] = $asignaturas;
		
		$basedatos->desconectar();
		require('vista/resultado.php');
	}
}
else
{
	$_SESSION['error'] = "Sólo los profesores pueden ver los resultados";
	header('Location: login');
}

?>