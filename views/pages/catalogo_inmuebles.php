<div class="contenedor-anuncios">
    <?php foreach ($inmuebles as $inmueble) :
    ?>
        <div class="anuncio">
            <img loading="lazy" src="imagenes/<?php echo $inmueble->imagen ?>" alt="Anuncio">
            <div class="contenido-anuncio">
                <h3><?php echo $inmueble->titulo ?></h3>
                <p><?php echo $inmueble->descripcion ?></p>
                <div class="cardFoot">
                    <p class="precio"><?php echo $inmueble->precio ?>€</p>
                    <ul class="iconos-caracteristicas">
                        <li>
                            <img loading="lazy" src="build/img/shower.svg" alt="icono wc">
                            <p><?php echo $inmueble->baños ?></p>
                        </li>
                        <li>
                            <img loading="lazy" src="build/img/car.svg" alt="icono estacionamiento">
                            <p><?php echo $inmueble->aparcamiento ?></p>
                        </li>
                        <li>
                            <img loading="lazy" src="build/img/bed.svg" alt="icono dormitorio">
                            <p><?php echo $inmueble->habitaciones ?></p>
                        </li>
                    </ul>
                    <a href="/inmueble?id=<?php echo $inmueble->id ?>" class="boton-amarillo-block"> Ver Propiedad </a>
                </div><!-- Card Footer>-->
            </div>
            <!--.contenido-anuncio -->
        </div>
        <!--.anuncio-->
    <?php endforeach; ?>
</div>
<!--.contenedor-anuncios-->