<?php include 'head.php'; ?>
<div id="buscador">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Buscador de coches</h1>
                <p>Utilice el filtro de búsqueda para realizar una consulta. Puede combinar varios para una búsqueda más exacta.</p>
                <form method="POST" action="/supercars/buscador/buscar">
                    <label>Marca</label>
                    <p>Busca todos los coches de una marca</p>
                    <select class="form-control" name="marca">
                        <option value="0">Seleccionar</option>
                    <?php 
                        foreach ($marcas as $marca)
                        {
                            echo '<option value="'.$marca->id.'">'.$marca->nombre.'</option>';
                        }
                    ?>
                    </select>
                    <?= form_submit('submit','Buscar', array('class' => 'submit')); ?>
                </form>
                <form method="POST" action="/supercars/buscador/buscar">
                    <label>Modelo</label>
                    <select class="form-control" name="modelo">
                        <option value="0">Seleccionar</option>
                    <?php 
                        foreach ($modelos as $modelo)
                        {
                            echo '<option value="'.$modelo->id.'">'.$modelo->modelo.'</option>';
                        }
                    ?>
                    </select>
                    <?= form_label('Combustible','combustible', array('class' => 'label')); ?>
                    <select class="form-control" name="combustible">
                        <option value="0">Seleccionar</option>
                        <option value="Gasolina">Gasolina</option>
                        <option value="Diesel">Diesel</option>
                        <option value="Hibrido">Hibrido</option>
                    </select>
                    <?= form_label('Potencia','potencia', array('class' => 'label')); ?>
                    <?= form_input('potencia','', array('class' => 'form-control', 'type' => 'text')); ?>
                    <?= form_label('Año','año', array('class' => 'label')); ?>
                    <?= form_input('año','', array('class' => 'form-control', 'type' => 'date')); ?>
                    <?= form_label('Precio','precio', array('class' => 'label')); ?>
                    <?= form_input('precio','', array('class' => 'form-control', 'type' => 'text')); ?>
                    <?= form_submit('submit','Buscar', array('class' => 'submit')); ?>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>