<?php

if (!isset($_SESSION)) {
    session_start();
}
$auth = $_SESSION['login'] ?? false;

if ($_SERVER['REQUEST_URI'] == '/') {
    $inicio = true;
} else {
    $inicio = false;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- /Inmobiliaria -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>J.M Inmuebles</title>
    <link rel="shortcut icon" href="../build/img/icono1.svg" type="image/x-icon">
    <link rel="stylesheet" href="../build/css/app.css">
</head>

<body>
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/" class="logo">
                    <h1 class="logo__nombre">J.M. <span class="logo__light">INMUEBLES</span></h1>
                </a>
                <div class="mobile-menu">
                    <div id="menuToggle">
                        <input type="checkbox" />
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <nav class="navegacion n1">
                    <a href="/nosotros">Nosotros</a>
                    <a href="/anuncios">Anuncios</a>
                    <a href="/blog">Blog</a>
                    <a href="/contacto">Contacto</a>

                    <?php if (!$auth) :  ?>
                        <a href="/login">Acceso Empleados</a>
                    <?php endif; ?>
                    <?php if ($auth) : ?>
                        <a href="/admin">Panel</a>
                        <a href="/logout">Cerrar Sesion</a>
                    <?php endif; ?>
                </nav>
            </div>
            <!--.barra-->
            <?php echo $inicio ? '<h1>Trabajamos por y para tu tranquilidad.</h1>' : ''; ?>
        </div>
    </header>


    <?php echo $content; ?>


    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="/nosotros">Nosotros</a>
                <a href="/anuncios">Anuncios</a>
                <a href="/blog">Blog</a>
                <a href="/contacto">Contacto</a>

            </nav>
            <p class="copyright"> Todos los derechos reservados <?php echo date('Y'); ?> &copy.</p>
        </div>
    </footer>
    <script src="../build/js/bundle.min.js"></script>
</body>

</html>