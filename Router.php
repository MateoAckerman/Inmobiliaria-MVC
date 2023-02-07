<?php

namespace MVC;

class Router
{
    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url, $func)
    {
        $this->rutasGET[$url] = $func;
    }

    public function post($url, $func)
    {
        $this->rutasPOST[$url] = $func;
    }

    public function checkRutas()
    {
        session_start();

        $auth = $_SESSION['login'] ?? null;

        //Rutas restringidas
        $restrict_rutas = ['/admin', '/inmuebles/create', '/inmuebles/actualizar', '/inmuebles/eliminar', '/vendedores/create', '/vendedores/actualizar', '/vendedores/eliminar'];

        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'GET') {
            $func = $this->rutasGET[$urlActual] ?? null;
        } else {
            $func = $this->rutasPOST[$urlActual] ?? null;
        }

        if (in_array($urlActual, $restrict_rutas) && !$auth) {
            //Si es una ruta con restriccion, comprobar que estamos logueados
            //No log -> inicio

            header('Location: /');
        };

        //URL existe o no
        if ($func) {
            call_user_func($func, $this);
        } else {
            echo "Pagina no encontrada";
        }
    }

    public function view($view, $datos = [])
    {
        foreach ($datos as $key => $value) {
            $$key = $value;
        }

        //Iniciamos el buffer de salida
        ob_start();

        include __DIR__ . "/views/$view.php";

        $content = ob_get_clean();

        include __DIR__ . "/views/layout.php";
    }
}
