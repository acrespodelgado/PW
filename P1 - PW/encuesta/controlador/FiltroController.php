<?php

session_start();
require('modelo/Bd.php');

//Creamos el objeto de nuestra bd y realizamos la conexion

$basedatos = new Bd();
$basedatos->conectar();

if(isset($_SESSION['rol']) && !empty($_SESSION['rol']) && $_SESSION['rol'] == 1)
{
	if(isset($_SESSION['filtros']))
		unset($_SESSION['filtros']);
	if(isset($_SESSION['filtros_resp']['r']))
		unset($_SESSION['filtros_resp']['r']);

	if(isset($_POST) && !empty($_POST))
	{	
		$_SESSION['filtros'] = '';
		foreach ($_POST as $key => $filtro)
		{
			if($filtro != 0 && $key != 'filtros')
				$_SESSION['filtros'] .= "<h3>".$key."</h3>";
		}

		$query = "SELECT id FROM encuestas";
		$contador = 0;
		if(!empty($_POST["edad"])){
			$query .= " WHERE edad = " . $_POST['edad'];
			$contador++;
		}
		if(!empty($_POST["sexo"]))
		{
			if($contador != 0)
				$query .= " AND ";
			else
				$query .= " WHERE ";
			$contador++;
			$query .= "sexo = " . $_POST['sexo'];
		}
		if(!empty($_POST["cursoalto"]))
		{
			if($contador != 0)
				$query .= " AND ";
			else
				$query .= " WHERE ";
			$contador++;
			$query .= "cursoalto = " . $_POST['cursoalto'];
		}
		if(!empty($_POST["cursobajo"]))
		{
			if($contador != 0)
				$query .= " AND ";
			else
				$query .= " WHERE ";
			$contador++;
			$query .= "cursobajo = " . $_POST['cursobajo'];
		}
		if(!empty($_POST["matriculas"]))
		{
			if($contador != 0)
				$query .= " AND ";
			else
				$query .= " WHERE ";
			$contador++;
			$query .= "matriculas = " . $_POST['matriculas'];
		}
		if(!empty($_POST["examenes"]))
		{
			if($contador != 0)
				$query .= " AND ";
			else
				$query .= " WHERE ";
			$contador++;
			$query .= "examenes = " . $_POST['examenes'];
		}
		if(!empty($_POST["interes"]))
		{
			if($contador != 0)
				$query .= " AND ";
			else
				$query .= " WHERE ";
			$contador++;
			$query .= "interes = " . $_POST['interes'];
		}
		if(!empty($_POST["tutorias"]))
		{
			if($contador != 0)
				$query .= " AND ";
			else
				$query .= " WHERE ";
			$contador++;
			$query .= "tutorias = " . $_POST['tutorias'];
		}
		if(!empty($_POST["dificultad"]))
		{
			if($contador != 0)
				$query .= " AND ";
			else
				$query .= " WHERE ";
			$contador++;
			$query .= "dificultad = " . $_POST['dificultad'];
		}
		if(!empty($_POST["calificacion"]))
		{
			if($contador != 0)
				$query .= " AND ";
			else
				$query .= " WHERE ";
			$contador++;
			$query .= "calificacion = " . $_POST['calificacion'];
		}
		if(!empty($_POST["asistencia"]))
		{
			if($contador != 0)
				$query .= " AND ";
			else
				$query .= " WHERE ";
			$contador++;
			$query .= "asistencia = " . $_POST['asistencia'];
		}

		if(isset($_SESSION['idas']) && isset($_SESSION['idprof']))
		{
			$idAsignatura = $_SESSION['idas'];
			$idProfesor = $_SESSION['idprof'];
			//unset($_SESSION['idas']);
			//unset($_SESSION['idprof']);
		}

		$basedatos->conectar();	

		$consulta = $basedatos->consultar("SELECT * FROM preguntas ORDER BY id ASC");
		$preg = mysqli_fetch_all($consulta);
		$numPreguntas = $consulta->num_rows;

		$consulta = $basedatos->consultar("SELECT idPregunta, count(*) AS n, AVG(respuesta) AS m, sqrt((sum(power(respuesta,2))/count(respuesta))-power(avg(respuesta),2)) FROM respuestas WHERE idProfesor = (SELECT idReal from profesores WHERE id = $idProfesor) AND idEncuesta in (" . $query . ") GROUP BY idPregunta ORDER BY idPregunta ASC");
		$r = mysqli_fetch_all($consulta);

		$_SESSION['filtros_resp'] = ["Preg" => $preg, "r" => $r, "numPreguntas" => $numPreguntas];

		$basedatos->desconectar();	
	}
	
	require('vista/filtros.php');
}
else
{
	$_SESSION['error'] = "Sólo los profesores pueden ver los resultados";
	header('Location: login');
}

?>