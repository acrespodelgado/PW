<?php include 'head.php'; ?>
<div id="editar">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Editar coche</h1>
                <?= form_open(base_url().'admin/editar/'.$coche[0]->id, array('name' => 'edit_form', 'id' => 'edit_form'));?>
                <?= form_label('Potencia','potencia', array('class' => 'label')); ?>
                <?= form_input('potencia',$coche[0]->potencia, array('class' => 'form-control', 'type' => 'text')); ?>
                <?= form_label('Precio','precio', array('class' => 'label')); ?>
                <?= form_input('precio',$coche[0]->precio, array('class' => 'form-control', 'type' => 'text')); ?>
                <?= form_label('Equipamiento','equipamiento', array('class' => 'label')); ?>
                <?= form_textarea('equipamiento',$coche[0]->equipamiento, array('class' => 'form-control')); ?>
                <?= form_label('Descripcion','descripcion', array('class' => 'label')); ?>
                <?= form_textarea('descripcion',$coche[0]->descripcion, array('class' => 'form-control')); ?>
                <?= form_label('URL Imagen','imagen', array('class' => 'label')); ?>
                <?= form_textarea('imagen',$coche[0]->imagen, array('class' => 'form-control')); ?>
                <img src="<?= $coche[0]->imagen;?>" class="img-fluid">
                <br>
                <?= form_submit('submit','Editar', array('class' => 'submit')); ?>
                <?= form_close(); ?>
                <?= validation_errors(); ?>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>