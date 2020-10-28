<?php include 'head.php'; ?>
<div id="login">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Iniciar sesión</h1>
                <form action="<?php echo base_url();?>login/inicio_sesion" method="POST">
                    <label for="Usuario"> Usuario</label>
                    <input class="form-control" type="text" name="user"/>
                    <label for="contraseña"> Contraseña</label>
                    <input class="form-control" type="password" name="password"/>
                    <input type="submit" value="Entrar" name="submit"/>
                </form>
                <?php 
                if (isset($mensaje) && !empty($mensaje))
                {
                    echo '<div class="alert alert-danger">'.$mensaje.'</div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>