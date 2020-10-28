<?php
session_start();
require_once ('modelo/Bd.php');
require_once ('modelo/Usuario.php');

unset($_SESSION['rol']);

if(isset($_POST['login']) && !empty($_POST['login']) && isset($_POST['password']) && !empty($_POST['password']))
{
	if(isset($_POST['alumno']) && !empty($_POST['alumno']))
	{
		$_SESSION['rol'] = 2;
		header('Location: index');
	}
	else
	{
		$usuario = new Usuario($_POST['login'],$_POST['password']);
		if($usuario->iniciarSesion())
		{
			$_SESSION['rol'] = $usuario->getRol();
			if($usuario->getRol() == 1)
				header('Location: resultado');
			else
				header('Location: index');
		}
		else
		{
			$_SESSION['error'] = "El usuario y la contraseña son incorrectos";
			header('Location: login');
		}
	}
}
else
{
	require('vista/login.php');
}


?>