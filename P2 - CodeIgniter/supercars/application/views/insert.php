<?php include 'head.php'; ?>
<div id="insertar">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Registrar coche</h1>
                <?= form_open(base_url().'admin/insertar', array('name' => 'alta_form', 'id' => 'alta_form'));?>
                <?= form_label('Marca','marca', array('class' => 'label')); ?>
                <select name="marca" class="form-control">
                    <?php foreach ($marcas as $marca)
                    {
                        echo '<option value="'.$marca->id.'">'.$marca->nombre.'</option>';
                    }
                ?>
                </select>
                <?= form_label('Modelo','modelo', array('class' => 'label')); ?>
                <?= form_input('modelo','', array('class' => 'form-control', 'type' => 'text')); ?>
                <?= form_label('Combustible','combustible', array('class' => 'label')); ?>
                <?= form_input('combustible','', array('class' => 'form-control', 'type' => 'text')); ?>
                <?= form_label('Potencia','potencia', array('class' => 'label')); ?>
                <?= form_input('potencia','CV', array('class' => 'form-control', 'type' => 'text')); ?>
                <?= form_label('Año','año', array('class' => 'label')); ?>
                <?= form_input('año','', array('class' => 'form-control', 'type' => 'date')); ?>
                <?= form_label('Precio','precio', array('class' => 'label')); ?>
                <?= form_input('precio','€', array('class' => 'form-control', 'type' => 'text')); ?>
                <?= form_label('Equipamiento','equipamiento', array('class' => 'label')); ?>
                <?= form_textarea('equipamiento','Introduzca el equipamiento', array('class' => 'form-control')); ?>
                <?= form_label('Descripcion','descripcion', array('class' => 'label')); ?>
                <?= form_textarea('descripcion','Introduzca la descripcion', array('class' => 'form-control')); ?>
                <?= form_label('URL Imagen','imagen', array('class' => 'label')); ?>
                <?= form_textarea('imagen','', array('class' => 'form-control')); ?>

                <?= form_submit('submit','Registrar', array('class' => 'submit')); ?>
                <?= form_close(); ?>
                <?= validation_errors(); ?>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>