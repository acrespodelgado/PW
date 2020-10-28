<?php header ('Content-type: text/html; charset=utf-8'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href=<?php $_SERVER["SERVER_NAME"];?>"/encuesta/vista/recursos/custom.css">
	<title>Encuesta</title>
</head>
<body>
	<header>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<nav class="navbar navbar-expand-lg">
					 	<a class="navbar-brand" href="index">Universidad<span>de</span>Cádiz</a>
					 	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
					   		<span class="navbar-toggler-icon"></span>
					 	</button>
					 	<a class="right" href="login">Cerrar sesión</a>
					</nav>
				</div>
			</div>
		</div>
	</header>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<?php if(isset($_SESSION["error"]) && !empty($_SESSION["error"]))
					{
					?>
					<div class="alert alert-danger">
						<h2><?php echo $_SESSION["error"]; ?></h2>
					</div>
					<?php
						unset($_SESSION["error"]);
					}
					?>
					<?php if(isset($_SESSION["exito"]) && !empty($_SESSION["exito"]))
					{
					?>
					<div class="alert alert-success">
						<h2><?php echo $_SESSION["exito"]; ?></h2>
					</div>
					<?php
						unset($_SESSION["exito"]);
					}
					?>
					<?php include 'content.php'; ?>
				</div>
			</div>
		</div>
	</section>
</body>
</html>