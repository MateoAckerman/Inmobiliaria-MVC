<?php

namespace Controllers;

use MVC\Router;
use Model\Inmueble;
use Model\Vendedor;
use PHPMailer\PHPMailer\PHPMailer;

class WebController
{
    public static function index(Router $router)
    {
        //Busqueda de una cantidad de casas
        $inmuebles = Inmueble::getInmuebles(4);

        $router->view('pages/index', [
            'inmuebles' => $inmuebles,
            'inicio' => true
        ]);
    }
    public static function nosotros(Router $router)
    {
        $router->view('pages/nosotros', []);
    }
    public static function anuncios(Router $router)
    {
        //Busqueda de todos los anuncios de casas
        $inmuebles = Inmueble::all();

        $router->view('pages/anuncios', [
            'inmuebles' => $inmuebles
        ]);
    }
    public static function inmueble(Router $router)
    {
        $id = comprobarRedireccion('/anuncios');

        //Busqueda de una casa concreta
        $inmueble = Inmueble::find($id);
        $idVendedor = $inmueble->vendedores_id;

        //Busqueda del encargado
        $vendedor = Vendedor::find($idVendedor);

        $router->view('pages/inmueble', [
            'inmueble' => $inmueble,
            'vendedor' => $vendedor
        ]);
    }
    public static function blog(Router $router)
    {
        $router->view('pages/blog', []);
    }
    public static function entrada(Router $router)
    {
        $router->view('pages/entrada', []);
    }
    public static function entrada2(Router $router)
    {
        $router->view('pages/entrada2', []);
    }
    public static function contacto(Router $router)
    {
        $estado = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // debugguear($_POST);
            $form = $_POST['form'];



            //Declara una instancia y define el protocolo smtp
            $phpmailer = new PHPMailer();
            $phpmailer->isSMTP();
            $phpmailer->Host = 'smtp.mailtrap.io';
            $phpmailer->SMTPAuth = true;
            $phpmailer->Port = 2525;
            $phpmailer->Username = 'f5a36b7979cb0d';
            $phpmailer->Password = 'e14ddc2a848ed1';
            $phpmailer->SMTPSecure = 'tls';

            //Configuracion del mail
            $phpmailer->setFrom('admin@jm-inmobiliaria.es');
            $phpmailer->addAddress('admin@jm-inmobiliaria.es', 'JM_Inmobiliaria.com');
            $phpmailer->Subject = 'Nuevo mensaje de contacto.';

            $phpmailer->isHTML(true);
            $phpmailer->CharSet = 'UTF-8';

            $contenido = '<html>';
            $contenido .= '<p> Nuevo Mensaje </p>';
            $contenido .= '<p> Nombre: ' . $form['nombre'] . ' </p>';
            $contenido .= '<p> Apellidos: ' . $form['apellidos'] . ' </p>';
            $contenido .= '<p> Email: ' . $form['email'] . ' </p>';
            $contenido .= '<p> Telefono: ' . $form['telefono'] . ' </p>';
            $contenido .= '<p> Mensaje: ' . $form['mensaje'] . ' </p>';
            $contenido .= '<p> Compra o venta: ' . $form['compraventa'] . ' </p>';
            $contenido .= '<p> Presupuesto: ' . $form['presupuesto'] . '€ </p>';
            $contenido .= '<p> Via de Contacto: ' . $form['viaContacto'] . ' </p>';
            $contenido .= '<p> Fecha: ' . $form['fecha'] . ' </p>';
            $contenido .= '<p> Hora: ' . $form['hora'] . ' </p>';
            $contenido .= '<p> Nuevo Mensaje </p>';


            $phpmailer->Body = $contenido;
            $phpmailer->AltBody = 'Texto sin html';

            //Enviar el mail
            if ($phpmailer->send()) {
                $estado = "Enviado correctamente.";
            } else {
                $estado = "No se pudo enviar su mensaje.";
            }
        }
        $router->view('pages/contacto', [
            'estado' => $estado
        ]);
    }
}
