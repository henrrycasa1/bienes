<?php 
    require 'includes/funciones.php';
    incluirTemplate('header');
?>




    <main class="contenedor seccion">
        <h2>Casas y Depas en Venta</h2>

       <div class="contenedor-anuncios">
        <?php
            include "includes/config/database.php";
            $db=conectarDB();
            $con_sql="SELECT * from propiedades WHERE estado like 'Activo'";
            $res=mysqli_query($db,$con_sql);
            while($reg=mysqli_fetch_array($res)){
        ?> 
            <div class="anuncio">
                <picture>
                    <img loading="lazy" src="admin/propiedades/imagenes/<?php echo $reg['imagen'];?>" alt="anuncio">
                </picture>

                <div class="contenido-anuncio">
                    <h3><?php echo $reg['titulo'];?></h3>
                    <p><?php echo $reg['descripcion'];?></p>
                    <p class="precio"><?php echo $reg['precio'];?></p>

                    <ul class="iconos-caracteristicas">
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                            <p><?php echo $reg['wc'];?></p>
                        </li>
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                            <p><?php echo $reg['estacionamiento'];?></p>
                        </li>
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                            <p><?php echo $reg['habitaciones'];?></p>
                        </li>
                    </ul>

                    <a href="anuncio.html" class="boton-amarillo-block">
                        Ver Propiedad
                    </a>
                </div><!--.contenido-anuncio-->
            </div><!--anuncio-->
        <?php
            }
            ?>
        </div><!--anuncio-->
    </main>

    <?php
        incluirTemplate ('footer');
    ?>

    <script src="build/js/bundle.min.js"></script>
</body>
</html>
