<?php

namespace Controllers;

use MVC\Router;
use Model\Inmueble;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;


class InmuebleController
{
    public static function index(Router $router)
    {
        $inmuebles = Inmueble::all();
        $vendedores = Vendedor::all();
        //Muestra mensaje condicional
        $msg = $_GET['msg'] ?? null;

        $router->view('inmuebles/admin', [
            'inmuebles' => $inmuebles,
            'msg' => $msg,
            'vendedores' => $vendedores
        ]);
    }

    public static function create(Router $router)
    {
        $inmueble = new Inmueble;
        $vendedores = Vendedor::all();

        //Mensajes Error
        $errores = Inmueble::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $inmueble = new Inmueble($_POST['inmueble']);

            //Generador nombre unico
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            //Resize a la Imagen con Intervention
            if ($_FILES['inmueble']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['inmueble']['tmp_name']['imagen'])->fit(800, 600);
                $inmueble->setImagen($nombreImagen);
            }
            //Validar datos
            $errores = $inmueble->validarDatos();

            // Revisar que Errores este vacio
            if (empty($errores)) {

                //Crear la carpeta
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }

                //Guardamos la imagen en la carpeta del proyecto
                $image->save(CARPETA_IMAGENES . $nombreImagen);

                //Inmueble guardado en la BBDD
                $inmueble->guardar();
            }
        }

        $router->view('inmuebles/create', [
            'inmueble' => $inmueble,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router)
    {

        $id = comprobarRedireccion('/admin');

        $inmueble = Inmueble::find($id);
        $vendedores = Vendedor::all();

        $errores = Inmueble::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //?Asignamos los atributos con los datos del POST

            $args = $_POST['inmueble'];

            $inmueble->sinc($args);

            $errores = $inmueble->validarDatos();

            //Generador de nombre unico
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            // Revisar que Errores este vacio
            if (empty($errores)) {

                //Subida de archivos
                if ($_FILES['inmueble']['tmp_name']['imagen']) {
                    $image = Image::make($_FILES['inmueble']['tmp_name']['imagen'])->fit(800, 600);
                    $inmueble->setImagen($nombreImagen);
                    //Guardamos la imagen
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }
                $inmueble->guardar();
            }
        }

        $router->view('inmuebles/actualizar', [
            'inmueble' => $inmueble,
            'vendedores' => $vendedores,
            'errores' => $errores

        ]);
    }
    public static function eliminar(Router $router)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if ($id) {

                $tipo = $_POST['tipo'];
                if (validarTipos($tipo)) {
                    $inmueble = Inmueble::find($id);
                    $inmueble->eliminar();
                }
            }
        }
    }
}
