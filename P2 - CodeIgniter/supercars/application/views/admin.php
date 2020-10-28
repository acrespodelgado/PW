<?php include 'head.php'; ?>
<div id="admin">
    <div class="container coche">
        <div class="row">
            <div class="col-12">
                <?php if (isset($_SESSION['mensaje']) && !empty($_SESSION['mensaje']))
                {
                    echo '<div class="alert alert-success">'.$_SESSION['mensaje'].'</div>';
                    unset($_SESSION['mensaje']);
                }
                ?>
                <h1>Administrador</h1>
                <p>Panel de administración CRUD donde es posible interactuar con la base de datos añadiendo, eliminando o actualizando los datos de un coche.</p>
            </div>
            <div class="col-4">
                <div class="box">
                    <a href="<?= base_url();?>admin/insertar">
                        <h2>Insertar coche</h2>
                        <span class="borde"></span>
                        <i class="fa fa-car" aria-hidden="true"></i>         
                        <p>Añade un coche a la base de datos</p>
                    </a>
                </div>
            </div>
            <div class="col-4">
                <div class="box">
                    <a href="<?= base_url();?>admin/editar">
                        <h2>Editar coche</h2>
                        <span class="borde"></span>
                        <i class="fa fa-tachometer" aria-hidden="true"></i>
                        <p>Edita un coche de la base de datos</p>
                    </a>
                </div>
            </div>
            <div class="col-4">
                <div class="box">
                    <a href="<?= base_url();?>admin/eliminar">
                        <h2>Eliminar coche</h2>
                        <span class="borde"></span>
                        <i class="fa fa-ban" aria-hidden="true"></i>
                        <p>Elimina un coche de la base de datos</p>
                    </a>
                </div>
            </div>
            <div class="col-4">
                <div class="box">
                    <a href="<?= base_url();?>admin/addMarca">
                        <h2>Añadir Marca</h2>
                        <span class="borde"></span>
                        <i class="fa fa-tag" aria-hidden="true"></i>
                        <p>Añadir una marca a la base de datos</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>