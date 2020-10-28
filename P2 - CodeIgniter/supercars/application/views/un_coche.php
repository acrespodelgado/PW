<?php include 'head.php'; ?>
<div id="un_coche">
    <div class="container-fluid coche">
        <div class="row">
            <div class="col-12">
                <?php if (isset($_SESSION['mensaje']) && !empty($_SESSION['mensaje']))
                {
                    echo '<div class="alert alert-success">'.$_SESSION['mensaje'].'</div>';
                    unset($_SESSION['mensaje']);
                }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <img class="img-fluid" src="<?= $coche[0]->imagen; ?>" alt="img">
            </div>
            <div class="col-6">
                <h1><?= $titulo; ?></h1>
                <h2>Descripción</h2>
                <p><?= $coche[0]->descripcion; ?></p>
                <h2>Potencia:</h2><span><?= $coche[0]->potencia; ?> cv</span>
                <h2>Combustible:</h2><span><?= $coche[0]->combustible; ?></span>
                <h2>Año:</h2><span><?= $coche[0]->año; ?></span>
                <h2>Equipamiento</h2>
                <p><?= $coche[0]->equipamiento; ?></p>
                <h2>Precio:</h2><span><?= $coche[0]->precio; ?>€</span>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>