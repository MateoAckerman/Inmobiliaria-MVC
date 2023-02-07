<?php

function conexionDB(): mysqli
{
    $db = new mysqli('localhost', 'root', 'root', 'inmobiliaria_jm');

    if (!$db) {
        echo "Error en la conexion";
        exit;
    }
    return $db;
}
