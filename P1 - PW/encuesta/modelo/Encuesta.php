<?php

require_once ('modelo/Bd.php');

class Encuesta
{
	private $id;
	private $idAsignatura;
	private $idTitulacion;
	private $grupo;
	private $edad;
	private $sexo;
	private $cursoalto;
	private $cursobajo;
	private $matriculas;
	private $examenes;
	private $interes;
	private $tutorias;
	private $dificultad;
	private $calificacion;
	private $asistencia;
	//private $idAleatorio;
	private $basedatos;

	function __construct($_idAsignatura, $_idTitulacion, $_grupo, $_edad, $_sexo, $_cursoalto, $_cursobajo, $_matriculas, $_examenes, $_interes, $_tutorias, $_dificultad, $_calificacion, $_asistencia)
	{
		$this->idAsignatura = $_idAsignatura;
		$this->idTitulacion = $_idTitulacion;
		$this->grupo = $_grupo;
		$this->edad = $_edad;
		$this->sexo = $_sexo;
		$this->cursoalto = $_cursoalto;
		$this->cursobajo = $_cursobajo;
		$this->matriculas = $_matriculas;
		$this->examenes = $_examenes;
		$this->interes = $_interes;
		$this->tutorias = $_tutorias;
		$this->dificultad = $_dificultad;
		$this->calificacion = $_calificacion;
		$this->asistencia = $_asistencia;

		//$this->idAleatorio = $_SESSION['idAleatorio'];

		$this->basedatos = new Bd();
		$this->basedatos->conectar();
	}

	function insertar()
	{
		//Sacamos el id de la ultima consulta, que es el valor maximo, y lo guardamos en la variable id
		$queryId = "SELECT MAX(id) as id FROM encuestas";
		$consultaId = $this->basedatos->consultar($queryId);
		$this->id = (mysqli_fetch_object($consultaId)->id) + 1;

		$query = "INSERT INTO encuestas VALUES ($this->id, '$this->idAsignatura', '$this->idTitulacion', '$this->grupo', $this->edad, $this->sexo, $this->cursoalto, $this->cursobajo, $this->matriculas, $this->examenes, $this->interes, $this->tutorias, $this->dificultad, $this->calificacion, $this->asistencia)";
		if($this->basedatos->insertar($query))
			return 1;
	}

	function consultar()
	{
		$query = "SELECT * FROM encuestas WHERE idAleatorio = $this->idAleatorio";
		if($resultado = $this->basedatos->consultar($query))
		{
			return $resultado;
		}

	}

	function getId()
	{
		return $this->id;
	}
}

?>