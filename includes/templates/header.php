<?php

if (!isset($_SESSION)) {
    session_start();
}
$auth = $_SESSION['login'] ?? false;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>J.M Inmuebles</title>
    <link rel="shortcut icon" href="/Inmobiliaria/build/img/icono1.svg" type="image/x-icon">
    <link rel="stylesheet" href="/Inmobiliaria/build/css/app.css">
</head>

<body>
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/Inmobiliaria/index.php" class="logo">
                    <!-- <img src="build/img/logo.svg" alt="logo web"> -->
                    <h1 class="logo__nombre">J.M. <span class="logo__light">INMUEBLES</span></h1>
                </a>
                <div class="mobile-menu">
                    <img src="/Inmobiliaria/build/img/barras.svg" alt="icono menu">
                </div>
                <nav class="navegacion n1">
                    <a href="/Inmobiliaria/nosotros.php">Nosotros</a>
                    <a href="/Inmobiliaria/anuncios.php">Anuncios</a>
                    <a href="/Inmobiliaria/blog.php">Blog</a>
                    <a href="/Inmobiliaria/contacto.php">Contacto</a>

                    <?php if (!$auth) :  ?>
                        <a href="/Inmobiliaria/login.php">Iniciar Sesion</a>
                    <?php endif;  ?>
                    <?php if ($auth) :  ?>
                        <a href="/Inmobiliaria/admin/index.php">Panel</a>
                        <a href="/Inmobiliaria/cerrar-sesion.php">Cerrar Sesion</a>
                    <?php endif;  ?>

                </nav>
            </div>
            <!--.barra-->
            <?php echo $inicio ? '<h1>Venta de Casas y Oficinas Exclusivas</h1>' : ''; ?>

        </div>
    </header>