<?php include 'head.php'; ?>
<div id="delete">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Eliminar un coche</h1>
                <p>Seleccione un coche para eliminarlo de la base de datos.</p>
            </div>
            <?php
                foreach ($marcas as $marca)
                {
                    foreach ($modelos as $modelo)
                    {
                        if ($modelo->marca == $marca->id)
                        {
                            foreach ($coches as $coche)
                            {
                                if ($coche->modelo == $modelo->id)
                                {
                                    echo '<div class="col-12 box-coche">';
                                    echo '<a onclick="removeCar('.$coche->id.');">';
                                    echo '<h1>'.$marca->nombre." ".$modelo->modelo.'</h1>';
                                    echo '<span class="borde"></span>';
                                    echo '<img class="img-fluid" src="'.$coche->imagen.'">';
                                    echo '<div class="box-detalles">';
                                    echo '<div class="row">';
                                    echo '<div class="col-4" style="border-right: 1px solid #434141;">';
                                    echo '<h2>Combustible: </h2><span>'.$coche->combustible.'</span>';
                                    echo '</div>';
                                    echo '<div class="col-4" style="border-right: 1px solid #434141;">';
                                    echo '<h2>Año: </h2><span>'.$coche->año.'</span>';
                                    echo '</div>';
                                    echo '<div class="col-4">';
                                    echo '<h2>Precio: </h2><span>'.$coche->precio.'€</span>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</a>';
                                    echo '</div>';
                                }
                            }
                        }
                    }
                }
            ?>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
<script>
    function removeCar(id)
    {
        if(confirm("¿Estás seguro de que deseas eliminar este coche?"))
        {
            window.location.href = "http://localhost/supercars/admin/eliminar/" + id;
        }
        else
        {
            return false;
        }
    }
</script>
</body>
</html>