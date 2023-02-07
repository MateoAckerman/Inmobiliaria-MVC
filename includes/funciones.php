<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');

//!Funciones para version inicial del proyecto
function incluirTemplates(string $nombre, bool $inicio = false)
{
    include TEMPLATES_URL . "/${nombre}.php";
}
function usuarioLogueado()
{
    session_start();
    if (!$_SESSION['login']) {
        header("Location: /Inmobiliaria/index.php");
    }
}

//Funcion para facilitar la programacion
function debugguear($variable)
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

//Funcion encargada de escapar caracteres extraños en strings
function esc($cadena): string
{
    $esc = htmlspecialchars($cadena);
    return $esc;
}

//Validacion de tipos para distinguir entre vendedores o inmuebles
function validarTipos($tipo)
{
    $tipos = ['vendedor', 'inmueble'];
    return in_array($tipo, $tipos);
}


function notificaciones($msg)
{
    $mensaje = '';

    switch ($msg) {
        case 1:
            $mensaje = ' Creado correctamente';
            break;
        case 2:
            $mensaje = ' Actualizado correctamente';
            break;
        case 3:
            $mensaje = ' Borrado correctamente';
            break;

        default:
            $mensaje = false;
            break;
    }
    return $mensaje;
}

function comprobarRedireccion($url)
{
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header("Location: ${url}");
    }

    return $id;
}
