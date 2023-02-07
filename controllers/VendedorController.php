<?php

namespace Controllers;

use MVC\Router;
use Model\Inmueble;
use Model\Vendedor;

class VendedorController
{

    public static function create(Router $router)
    {
        $vendedor = new Vendedor;

        //Mensajes Error
        $errores = Vendedor::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $vendedor = new Vendedor($_POST['vendedor']);

            $errores = $vendedor->validar();

            if (empty($errores)) {

                $vendedor->guardar();
            }
        }

        $router->view('vendedores/create', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }
    public static function actualizar(Router $router)
    {
        $id = comprobarRedireccion('/admin');

        $vendedor = Vendedor::find($id);

        //Mensajes Error
        $errores = Vendedor::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $args = $_POST['vendedor'];

            $vendedor->sinc($args);

            $errores = $vendedor->validar();

            if (empty($errores)) {

                $vendedor->guardar();
            }
        }

        $router->view('vendedores/actualizar', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }
    public static function eliminar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if ($id) {

                $tipo = $_POST['tipo'];
                if (validarTipos($tipo)) {
                    $vendedor = Vendedor::find($id);
                    $vendedor->eliminar();
                }
            }
        }
    }
}
