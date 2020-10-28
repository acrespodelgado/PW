<?php include 'head.php'; ?>
<div id="insertar">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Insertar una marca</h1>
                <p>Añada una marca y su país a nuestra base de datos.</p>
                <form method="POST" action="<?php echo base_url(); ?>admin/addMarca">
                    <?= form_label('Marca','marca', array('class' => 'label')); ?>
                    <?= form_input('marca','', array('class' => 'form-control', 'type' => 'text')); ?>
                    <?= form_label('País','pais', array('class' => 'label')); ?>
                    <?= form_input('pais','', array('class' => 'form-control', 'type' => 'text')); ?>
                    <?= form_submit('submit','Añadir', array('class' => 'submit')); ?>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>