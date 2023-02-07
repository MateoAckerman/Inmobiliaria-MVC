<?php

namespace Model;

class Admin extends Raiz
{
    protected static $tabla = 'usuarios';
    protected static $columnas = ['id', 'email', 'contraseña'];

    public $id;
    public $email;
    public $contraseña;

    public function __construct($args = [])
    {
        $this->id = $args['id']  ?? null;
        $this->email = $args['email']  ?? '';
        $this->contraseña = $args['contraseña']  ?? '';
    }

    public function validarDatos()
    {
        if (!$this->email) {
            self::$errores[] = 'Introduzca un email valido';
        }
        if (!$this->contraseña) {
            self::$errores[] = 'Introduzca una contraseña correcta';
        }

        return self::$errores;
    }

    public function userExist()
    {
        $query = " SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1 ";

        $result = self::$db->query($query);

        if (!$result->num_rows) {
            self::$errores[] = ' No existe ningun usuario con ese email ';
            return;
        }
        // debugguear($result);
        return $result;
    }

    public function checkContraseña($result)
    {
        $user = $result->fetch_object();
        $logged = password_verify($this->contraseña, $user->contraseña);
        // debugguear($user);

        if (!$logged) {
            self::$errores[] = 'La contraseña no es correcta';
        }

        return $logged;
    }

    public function auth()
    {
        session_start();

        $_SESSION['usuario'] = $this->email;
        $_SESSION['login'] = true;

        header('Location: /admin');
    }
}
