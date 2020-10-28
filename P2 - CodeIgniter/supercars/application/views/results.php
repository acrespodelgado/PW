<?php include 'head.php'; ?>
<div id="catalogo">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Resultado de búsqueda</h1>
            </div>
            <?php
                if(empty($coches))
                {
                    echo '<div class="col-12"><h2>No hay resultados</h2></div>';
                }
                else 
                {
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
                                        echo '<a href="'.base_url().'un_coche/coche/'.$coche->id.'">';
                                        echo '<h1>'.$marca->nombre." ".$modelo->modelo.'</h1>';
                                        echo '<span class="borde"></span>';
                                        echo '<img class="img-fluid" src="'.$coche->imagen.'">';
                                        echo '<div class="box-detalles">';
                                        echo '<div class="row">';
                                        echo '<div class="col-4" style="border-right: 1px solid #434141;">';
                                        echo '<h2>Descripción: </h2><span>'.$coche->descripcion.'</span>';
                                        echo '<h2>Combustible: </h2><span>'.$coche->combustible.'</span>';
                                        echo '</div>';
                                        echo '<div class="col-4" style="border-right: 1px solid #434141;">';
                                        echo '<h2>Potencia: </h2><span>'.$coche->potencia.' CV</span>';
                                        echo '<h2>Año: </h2><span>'.$coche->año.'</span>';
                                        echo '</div>';
                                        echo '<div class="col-4">';
                                        echo '<h2>Equipamiento: </h2><span>'.$coche->equipamiento.'</span>';
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
                }
            ?>
        </div>
    </div>
</div>
</body>
</html>