<?php

class Bd {
	
	private $host;
	private $bdname;
	private $usuario;
	private $pass;
	private $bd;

	function __construct() 
	{
		$this->host = 'localhost';
		$this->bdname = 'encuesta';
		$this->usuario = 'root';
		$this->pass = '';
	}

	/* Conectar a una base de datos de MySQL invocando al controlador */

	function conectar()
	{
    	$this->bd = mysqli_connect($this->host, $this->usuario, $this->pass, $this->bdname);
		
		//Si falla...
		if(!$this->bd)
		{
	    	die('Falló la conexión: ' . mysqli_connect_error());
		}
		
	}

	function desconectar()
	{
		if(!mysqli_close($this->bd)) 
		{
			die('Fallo la desconexión');
		}
	}

	function insertar($query)
	{
		$this->bd->query("SET NAMES 'utf8'");
		if($this->bd->query($query))
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}

	function consultar($query)
	{
		$this->bd->query("SET NAMES 'utf8'");
		if($resultado = $this->bd->query($query))
		{
			return $resultado;
		}
		else
		{
			return 0;
		}
	}
}

?>