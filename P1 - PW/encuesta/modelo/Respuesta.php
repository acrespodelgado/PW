<?php

require_once ('modelo/Bd.php');

class Respuesta
{
	private $id;
	private $idEncuesta;
	private $idPregunta;
	private $respuesta;
	private $profesor;
	private $basedatos;

	function __construct($_idEncuesta, $_idPregunta, $_respuesta, $_profesor)
	{
		$this->idEncuesta = $_idEncuesta;
		$this->idPregunta = $_idPregunta;
		$this->respuesta = $_respuesta;
		$this->profesor = $_profesor;
		
		$this->basedatos = new Bd();
		$this->basedatos->conectar();
	}

	function insertar()
	{
		//Sacamos el id de la ultima consulta, que es el valor maximo, y lo guardamos en la variable id
		$queryId = "SELECT MAX(id) as id FROM respuestas";
		$consultaId = $this->basedatos->consultar($queryId);
		$this->id = (mysqli_fetch_object($consultaId)->id) + 1;

		$query = "INSERT INTO respuestas VALUES ($this->id, $this->idEncuesta, $this->idPregunta, $this->respuesta, '$this->profesor')";
		if($this->basedatos->insertar($query))
			return 1;
	}

	function consultar()
	{
		$query = "SELECT * FROM respuestas WHERE idEncuesta = $this->idEncuesta";
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