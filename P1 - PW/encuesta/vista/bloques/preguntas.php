<p style="margin-top: 20px;">A continuación se presentan una serie de cuestiones relativas a la docencia en esta asignatura. Tu colaboración es necesaria y consiste en señalar en la escala de respuesta tu grado de acuerdo con cada una de las afirmaciones, teniendo en cuenta que <b>“1”</b> significa <b>“totalmente en desacuerdo”</b> y <b>“5” “totalmente de acuerdo”</b>. Si el enunciado no procede o no tienes suficiente información, marca la opción NS. En nombre de la Universidad de Cadiz, <b>GRACIAS POR TU PARTICIPACIÓN.</b></h3>
<?php

	for($i = 1; $i <= 3; ++$i)
	{
?>
		<h2>Profesor <?php echo $i; ?></h2>
		<h4>Código del profesor</h4>
		<div class="bordered">
				<?php for($j = 0; $j <= 9; ++$j)
				{
				?>
        				<div class="inline">
							<input type="radio" name="<?php echo 'prof-'.$i.'-1'; ?>" value="<?php if($j == 0) echo 10; else echo $j; ?>"><?php echo $j; ?>
							<input type="radio" name="<?php echo 'prof-'.$i.'-2'; ?>" value="<?php if($j == 0) echo 10; else echo $j; ?>"><?php echo $j; ?>
							<input type="radio" name="<?php echo 'prof-'.$i.'-3'; ?>" value="<?php if($j == 0) echo 10; else echo $j; ?>"><?php echo $j; ?>
							<input type="radio" name="<?php echo 'prof-'.$i.'-4'; ?>" value="<?php if($j == 0) echo 10; else echo $j; ?>"><?php echo $j; ?>
						</div>
				<?php
				}
				?>
		</div>
		<h4>Planificación de la enseñanza y el aprendizaje</h4>
		<div class="bordered">
			<?php foreach($_SESSION['preguntas'] as $pr)
			{
				if($pr['tipo'] == 0)
				{
			?>
					<div class="inline">
						<h3><?php echo $pr['id'] . ". " . $pr['pregunta']; ?></h3>
						<br>
						<input type="radio" name="pr-<?php echo $pr['id']; ?>" value="6"><span>NS</span>
						<input type="radio" name="pr-<?php echo $pr['id']; ?>" value="1"><span>1</span>
						<input type="radio" name="pr-<?php echo $pr['id']; ?>" value="2"><span>2</span>
						<input type="radio" name="pr-<?php echo $pr['id']; ?>" value="3"><span>3</span>
						<input type="radio" name="pr-<?php echo $pr['id']; ?>" value="4"><span>4</span>
						<input type="radio" name="pr-<?php echo $pr['id']; ?>" value="5"><span>5</span>
					</div>
			<?php
				}
			}
			?>
		</div>
		<h4>Desarollo de la docencia</h4>
		<div class="bordered">
			<?php $contador = 1; ?>
			<?php foreach($_SESSION['preguntas'] as $pr)
			{
				if($pr['tipo'] != 0 && $pr['tipo'] != 6)
				{
			?>
					<div class="inline">
						<?php
						foreach($_SESSION["titulos"] as $clave => $valor)
						{
							if(intval($pr['tipo']) == $clave && $contador == $clave)
							{
								$contador++;
						?>
								<h4><?php echo $valor; ?></h4>
						<?php
							}
						}
						?>
						<h3><?php echo $pr['id'] . ". " . $pr['pregunta']; ?></h3>
						<br>
						<input type="radio" name="pr-<?php echo $pr['id']; ?>" value="6"><span>NS</span>
						<input type="radio" name="pr-<?php echo $pr['id']; ?>" value="1"><span>1</span>
						<input type="radio" name="pr-<?php echo $pr['id']; ?>" value="2"><span>2</span>
						<input type="radio" name="pr-<?php echo $pr['id']; ?>" value="3"><span>3</span>
						<input type="radio" name="pr-<?php echo $pr['id']; ?>" value="4"><span>4</span>
						<input type="radio" name="pr-<?php echo $pr['id']; ?>" value="5"><span>5</span>
					</div>
			<?php
				}
			}
			?>
		</div>
		<h4>Resultados</h4>
		<div class="bordered">
			<?php 
			foreach($_SESSION['preguntas'] as $pr)
			{
				if($pr['tipo'] == 6)
				{
			?>
				<div class="inline">
					<h3><?php echo $pr['id'] . ". " . $pr['pregunta']; ?></h3>
					<br>
					<input type="radio" name="pr-<?php echo $pr['id']; ?>" value="6"><span>NS</span>
					<input type="radio" name="pr-<?php echo $pr['id']; ?>" value="1"><span>1</span>
					<input type="radio" name="pr-<?php echo $pr['id']; ?>" value="2"><span>2</span>
					<input type="radio" name="pr-<?php echo $pr['id']; ?>" value="3"><span>3</span>
					<input type="radio" name="pr-<?php echo $pr['id']; ?>" value="4"><span>4</span>
					<input type="radio" name="pr-<?php echo $pr['id']; ?>" value="5"><span>5</span>
				</div>
			<?php
				}
			}
			?>
		</div>
<?php
	}
?>