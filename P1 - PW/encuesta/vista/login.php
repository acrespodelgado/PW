<?php header ('Content-type: text/html; charset=utf-8'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href=<?php $_SERVER["SERVER_NAME"];?>"/encuesta/vista/recursos/custom.css">
	<title>Encuesta</title>
</head>
<body>
	<header>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<nav class="navbar navbar-expand-lg">
					 	<a class="navbar-brand" href="<?php if(isset($_SESSION['rol'])) echo 'index'; else echo '#'; ?>">Universidad<span>de</span>Cádiz</a>
					 	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
					   		<span class="navbar-toggler-icon"></span>
					 	</button>
					 	<?php if(isset($_SESSION['rol']) && $_SESSION['rol'] == 1)
					 	{
					 	?>
					 	<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
							<div class="navbar-nav">
					    		<a class="nav-item nav-link" href="resultado">Resultados</a>
					    	</div>
					 	</div>
					 	<?php
					 	}
					 	?>
					</nav>
				</div>
			</div>
		</div>
	</header>
	<section id="login">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<?php if(isset($_SESSION['error']) && !empty($_SESSION['error']))
					{
					?>
					<div class="alert alert-danger">
						<h2><?php echo $_SESSION['error']; ?></h2>
					</div>
					<?php
						unset($_SESSION['error']);
					}
					?>
					<h2>Acceso privado</h2>
					<p>Inicie sesión como profesor para ver los resultados de las encuestas, en otro caso acceda como alumno sin iniciar sesión para realizarlas.</p>
					<form method="POST" action="login">
						<div class="inline">
							<label>Usuario</label>
							<input type="text" name="login">
						</div>
						<div class="inline">
							<label>Password</label>
							<input type="password" name="password">
						</div>
						<div class="inline">
							<button type="submit">Acceder</button>
							<a onclick="alumno();">Acceder como alumno</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</body>
<script>
	function alumno() {
		var inputAlumno = '<input type="text" name="alumno" class="hide" value="1">'
		$('input[name="login"]').text("alumno").val("alumno");
		$('input[name="password"]').text("1234").val("1234");
		$('form').append(inputAlumno);
	}
</script>
</html>