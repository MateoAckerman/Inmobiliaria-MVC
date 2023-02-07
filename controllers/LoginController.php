<?php

namespace Controllers;

use MVC\Router;
use Model\Admin;


class LoginController
{
    public static function login(Router $router)
    {
        $errores = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $auth = new Admin($_POST);
            $errores = $auth->validarDatos();

            if (empty($errores)) {
                //Verificamos datos y logueamos
                $result = $auth->userExist();
                if (!$result) {
                    $errores = Admin::getErrores();
                } else {
                    $logged = $auth->checkContraseña($result);

                    if ($logged) {
                        $auth->auth();
                    } else {
                        $errores = Admin::getErrores();
                    }
                }
            }
        }


        $router->view('pages/login', [
            'errores' => $errores
        ]);
    }
    public static function logout()
    {
        session_start();
        $_SESSION = [];
        header('Location: /');
    }
}
