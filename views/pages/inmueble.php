<main class="contenedor seccion contenido-centrado">

    <h1><?php echo $inmueble->titulo ?></h1>

    <img loading="lazy" src="imagenes/<?php echo $inmueble->imagen ?>" alt="imagen de la propiedad">


    <div class="resumen-inmueble">
        <p class="precio"> <?php echo $inmueble->precio ?>€</p>
        <ul class="iconos-caracteristicas">
            <li>
                <img class="icono" loading="lazy" src="build/img/shower.svg" alt="icono wc">
                <p><?php echo $inmueble->baños ?></p>
            </li>
            <li>
                <img class="icono" loading="lazy" src="build/img/car.svg" alt="icono estacionamiento">
                <p><?php echo $inmueble->aparcamiento ?></p>
            </li>
            <li>
                <img class="icono" loading="lazy" src="build/img/bed.svg" alt="icono habitaciones">
                <p><?php echo $inmueble->habitaciones ?></p>
            </li>
        </ul>

        <p class="descrip"><?php echo $inmueble->descripcion ?></p>
        <p><strong>Empleado encargado:</strong> <?php echo $vendedor->nombre . " " . $vendedor->apellidos ?></p>
    </div>
    <a onclick="history.back()" class="boton boton-verde">Volver</a>

</main>