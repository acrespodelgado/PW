<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
	<link rel="stylesheet" type="text/css" href=<?php $_SERVER["SERVER_NAME"];?>"/encuesta/vista/recursos/custom.css">
	<title>Resultados</title>
</head>
	<body>
		<header>
			<div class="container">
				<div class="row">
					<div class="col-12">
						<nav class="navbar navbar-expand-lg">
						 	<a class="navbar-brand" href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/encuesta/resultado">Universidad<span>de</span>Cádiz</a>
						 	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
						   		<span class="navbar-toggler-icon"></span>
						 	</button>
						 	<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
								<div class="navbar-nav">
						    		<a class="nav-item nav-link active" href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/encuesta/resultado">Resultados</a>
						    	</div>
						 	</div>
						 	<a class="right" href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/encuesta/login">Cerrar sesión</a>
						</nav>
					</div>
				</div>
			</div>
		</header>
		<section>
			<?php include 'content-resultados.php'; ?>
		</section>
	</body>
</html>