
<div class="container">
	<div class="row">
		<div class="col-12">
			<h2>Búsqueda por asignaturas</h2>
			<div id="divAsignaturas">
				<label>Seleccione su asignatura</label>
				<select name="asignatura" class="select-result">
					<?php 
					foreach($_SESSION['asignaturas'] as $as)
					{
					?>
						<option value="<?php echo $as['id']; ?>"><?php echo $as['nombre']; ?></option>
					<?php
					}
					unset($_SESSION['asignaturas']);
					?>
				</select>
				<button onclick="verProfesores();">Continuar</button>
			</div>
			<div id="divProfesores" class="hide">
				<label>Seleccione su profesor</label>
				<select name="profesores" class="select-result"></select>
				<button onclick="verResultados()">Enviar</button>
			</div>
		</div>
		<div class="col-12">
			<div id="datosProfesor">
			</div>
		</div>
		<div class="col-12">
			<div class="hide" id="filtros">
				<form action="http://<?php echo $_SERVER['SERVER_NAME']; ?>/encuesta/filtros" method="POST">
					<h2>Búsqueda por filtros</h2>
					<label>Edad</label>
					<select name="edad">
						<option value="" selected>Todos</option>
						<option value="1"><=19</option>
						<option value="2">20-21</option>
						<option value="3">22-23</option>
						<option value="4">24-25</option>
						<option value="5">>25</option>
					</select>
					<label>Sexo</label>
					<select name="sexo">
						<option value="" selected>Todos</option>
						<option value="1">Hombre</option>
						<option value="2">Mujer</option>
					</select>
					<label>Curso más alto matriculado</label>
					<select name="cursoalto">
						<option value="" selected>Todos</option>
						<option value="1">1º</option>
						<option value="2">2º</option>
						<option value="3">3º</option>
						<option value="4">4º</option>
						<option value="5">5º</option>
						<option value="6">6º</option>
					</select>
					<label>Curso más bajo matriculado</label>
					<select name="cursobajo">
						<option value="" selected>Todos</option>
						<option value="1">1º</option>
						<option value="2">2º</option>
						<option value="3">3º</option>
						<option value="4">4º</option>
						<option value="5">5º</option>
						<option value="6">6º</option>
					</select>
					<label>Número de matrículas en la asignatura</label>
					<select name="matriculas">
						<option value="" selected>Todos</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">>3</option>
					</select>
					<label>Veces que te has examinado</label>
					<select name="examenes">
						<option value="" selected>Todos</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">>3</option>
					</select>
					<label>Interés por la asignatura</label>
					<select name="interes">
						<option value="" selected>Todos</option>
						<option value="1">Nada</option>
						<option value="2">Algo</option>
						<option value="3">Bastante</option>
						<option value="4">Mucho</option>
					</select>
					<label>Hago uso de las tutorías</label>
					<select name="tutorias">
						<option value="" selected>Todos</option>
						<option value="1">Nada</option>
						<option value="2">Algo</option>
						<option value="3">Bastante</option>
						<option value="4">Mucho</option>
					</select>
					<label>Dificultad de la asignatura</label>
					<select name="dificultad">
						<option value="" selected>Todos</option>
						<option value="1">Baja</option>
						<option value="2">Media</option>
						<option value="3">Alta</option>
						<option value="4">Muy alta</option>
					</select>
					<label>Calificación esperada</label>
					<select name="calificacion">
						<option value="" selected>Todos</option>
						<option value="1">N.P.</option>
						<option value="2">Sus.</option>
						<option value="3">Apr.</option>
						<option value="4">Not.</option>
						<option value="5">Sobr.</option>
						<option value="5">Mat.H.</option>
					</select>
					<label>Asistencia a clase</label>
					<select name="asistencia">
						<option value="" selected>Todos</option>
						<option value="1">Menos 50%</option>
						<option value="2">Entre 50% y 80%</option>
						<option value="3">Más del 80%</option>
					</select>
					<button type="submit">Enviar</button>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	function verProfesores()
	{
		//Sacamos el id de la asignatura, que es el valor del select
		var asignatura = $('select[name="asignatura"]').val();
		//Creamos el ajax 
		$.ajax({
            type: "POST",
            //Se hace la peticion post al controlador de resultado
            url: 'http://localhost/encuesta/resultado',
            //Le pasamos el id de la asignatura
            data : { id: asignatura },
            success: function(response)
            {
            	//Si recibe respuesta, volvemos visible el select de profesores y le añadimos los datos recibidos del ajax
                var jsonData = JSON.parse(response);
                if (jsonData.OK == "1")
                {	
                	$('#divProfesores').removeClass('hide');
                	var selector = $('select[name="profesores"]');
                	selector.html('');
                	$.each(jsonData.data, function(key, value) {
                		//Esto funciona con jsonData.data[key].nombre o value.nombre
                    	selector.append($('<option></option>').attr('value',value.id).text(value.nombre + " " + value.apellidos));
                	});
                }
           }
       	});
	}

	function verResultados()
	{
		var asignatura = $('select[name="asignatura"]').val();
        var profesor = $('select[name="profesores"]').val();
        $.ajax({
            type: "POST",
            //Se hace la peticion post al controlador de resultado
            url: 'http://localhost/encuesta/resultado',
            //Le pasamos el id de la asignatura
            data : { id: asignatura,  idProfesor : profesor},
            success: function(response)
            {
                var jsonData = JSON.parse(response);
                if (jsonData.OK == "1")
                {
                	$('#datosProfesor').html("<div class='fondo'></div>");
                    $('#datosProfesor').removeClass('hide');
                    $('#datosProfesor .fondo').append("<div class='inline'><label>Profesor: </label><span> " + jsonData.prof[1]+ " " +jsonData.prof[2]+"</span></div>");
                    $('#datosProfesor .fondo').append("<div class='inline'><label>Asignatura: </label><span> " + jsonData.asig["idTitulacion"] + jsonData.asig["id"] + " G" + jsonData.g["grupo"]+" "+jsonData.asig["nombre"]+"</span></div>");
                    $('#datosProfesor .fondo').append("<div class='inline'><label>Departamento: </label><span> " + jsonData.dep["nombre"] + "</span></div>");
                    $('#datosProfesor .fondo').append("<div class='inline'><label>Titulación: </label><span> " + jsonData.tit["nombre"] + "</span></div>");
                    $('#datosProfesor .fondo').append("<div class='inline'><label>Centro: </label><span> ESCUELA SUPERIOR DE INGENIERÍA</span></div>");
                    var i;
                    console.log(jsonData.numRespuestas);
                    if(jsonData.numRespuestas > 0)
                    {
                    	for(i = 0; i<jsonData.numRespuestas; ++i)
                    	{
                            $('#datosProfesor').append("<div class='inline'><label class='titulo'>"+jsonData.Preg[i][0]+ ".  " + jsonData.Preg[i][1] + "</label><div><span class='medias'>Número:</span><span class='res'>" + jsonData.r[i][1] + "</span><span class='medias'>Media:</span><span class='res'>" + jsonData.r[i][2] + "</span><span class='medias'>Desviación Típica:</span><span class='res'>"+ jsonData.r[i][3] + "</span></div>");
                    	}
                    	$('#filtros').removeClass('hide');
                    }
                    else
                    	$('#filtros').addClass('hide');
                }
        	}
        });
	}
</script>