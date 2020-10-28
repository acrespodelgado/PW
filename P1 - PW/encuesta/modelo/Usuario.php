<?php

require_once ('modelo/Bd.php');

class Usuario
{

	private $login;
	private $password;
	private $rol;
	private $basedatos;

	function __construct($_login, $_password)
	{
		$this->login = $_login;
		$this->password = $_password;
	}

	function iniciarSesion()
	{
		$this->basedatos = new Bd();
		$this->basedatos->conectar();
		$encontrado = 0;
		$query = "SELECT rol FROM usuarios WHERE login = '$this->login' AND password = '$this->password'";
		$resultado = $this->basedatos->consultar($query);
		if($resultado->num_rows > 0)
		{
			$this->rol = mysqli_fetch_object($resultado)->rol;
			$encontrado = 1;
		}
		return $encontrado;
	}

	function getRol()
	{
		return $this->rol;
	}
}

?>