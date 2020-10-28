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
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div id="divFiltros">
							<?php 
							if(!empty($_SESSION['filtros_resp']['r']))
							{
								if(isset($_SESSION['filtros']))
								{
									echo "<h2>Filtros: </h2>". $_SESSION['filtros']; 
									unset($_SESSION['filtros']);
								}
								echo "<input type='hidden' name='numPreguntas' value='".$_SESSION['filtros_resp']['numPreguntas']."'>";
								for($i = 0; $i<$_SESSION['filtros_resp']['numPreguntas']; ++$i){
									echo "<div class='inline'><label class='titulo'>".$_SESSION['filtros_resp']['Preg'][$i][0]." ".$_SESSION['filtros_resp']['Preg'][$i][1]."</label><div><span class='medias'>Número:</span><span class='res'>".$_SESSION['filtros_resp']['r'][$i][1]."</span><span class='medias'>Media:</span><span class='res'>".$_SESSION['filtros_resp']['r'][$i][2]."</span><span class='medias'>Desviación Típica:</span><span class='res'>".$_SESSION['filtros_resp']['r'][$i][3]."</span></div></div>";
									echo'<input type="hidden" name="m-'.$i.'" value="'.$_SESSION['filtros_resp']['r'][$i][2].'">';
									echo'<input type="hidden" name="d-'.$i.'" value="'.$_SESSION['filtros_resp']['r'][$i][3].'">';
								}
								echo '<div class="inline">';
								echo '<canvas id="myChart" width="400" height="400"></canvas>';
								echo '<canvas id="myChart2" width="400" height="400"></canvas>';
								unset($_SESSION['filtros_resp']);
								echo '</div>';
							}
							else 
								echo "<h2>No se han encontrado resultados con el/los filtro/s anteriores.</h2>";
							?>
						</div>
					</div>
				</div>
			</div>
		</section>
	</body>
	<script>
		var arrayPreguntas = [];
		var arrayMedias = [];
		var arrayDesviacion = [];
		var numPreguntas = $('input[name="numPreguntas"').val();
		var i;
		for(i = 1; i <= numPreguntas; i++ ) { arrayPreguntas.push(i) }
		for(i = 0; i < numPreguntas; i++) {
			arrayMedias.push($('input[name="m-' + i + '"').val());
			arrayDesviacion.push($('input[name="d-' + i + '"').val());
		}
		var ctx = document.getElementById('myChart').getContext('2d');
		var chart = new Chart(ctx, {
		    // The type of chart we want to create
		    type: 'bar',

		    // The data for our dataset
		    data: {
		        labels: arrayPreguntas,
		        datasets: [{
		            label: 'Medias de respuestas',
		            backgroundColor: '#384850',
		            borderColor: '#b4c4cb',
		            data: arrayMedias
		        }]
		    },

		    // Configuration options go here
		    options: {
		    	title: {
	        		display: true,
	        		text: 'Media de respuestas',
	        		fontSize: 42
	    		},
		    	layout: {
	        		width: 300,
	        		height: 300
		    	}
		    }
		});
		var ctx2 = document.getElementById('myChart2').getContext('2d');
		var chart2 = new Chart(ctx2, {
		    // The type of chart we want to create
		    type: 'bar',

		    // The data for our dataset
		    data: {
		        labels: arrayPreguntas,
		        datasets: [{
		            label: 'Desviación típica',
		            backgroundColor: '#b4c4cb',
		            borderColor: '#384850',
		            data: arrayDesviacion
		        }]
		    },

		    // Configuration options go here
		    options: {
		    	title: {
	        		display: true,
	        		text: 'Desviación típica',
	        		fontSize: 42
	    		},
		    	layout: {
	        		width: 300,
	        		height: 300
		    	}
		    }
		});
	</script>
</html>