<?php

use App\Inmueble;


$idAdd = $_GET['id'] ?? null;
$idAdd = filter_var($idAdd, FILTER_VALIDATE_INT);

if (!$idAdd) {
    header("Location: /Inmobiliaria/anuncios.php");
}

$inmueble = Inmueble::find($idAdd);

?>

<h1><?php echo $inmueble->titulo ?></h1>

<img loading="lazy" src="imagenes/<?php echo $inmueble->imagen ?>" alt="imagen de la propiedad">


<div class="resumen-propiedad">
    <p class="precio"> <?php echo $inmueble->precio ?>€</p>
    <ul class="iconos-caracteristicas">
        <li>
            <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
            <p><?php echo $inmueble->baños ?></p>
        </li>
        <li>
            <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
            <p><?php echo $inmueble->aparcamiento ?></p>
        </li>
        <li>
            <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
            <p><?php echo $inmueble->habitaciones ?></p>
        </li>
    </ul>

    <p><?php echo $inmueble->descripcion ?></p>


</div>