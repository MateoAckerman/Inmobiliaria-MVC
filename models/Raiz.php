<?php

namespace Model;

class Raiz
{
    //BBDD
    protected static $db;
    protected static $tabla = '';
    protected static $columnasdb = [];

    //Errores
    protected static $errores = [];

    //Conexion BBDD
    public static function setDB($basedatos)
    {
        self::$db = $basedatos;
    }

    //Devuelve un array con los errores generados en la validacion de datos
    public static function getErrores()
    {
        return static::$errores;
    }
    //Validacion de las entradas de los formularios
    public function validarDatos()
    {
        static::$errores = [];
        return static::$errores;
    }

    public function guardar()
    {
        if (!is_null($this->id)) {
            $this->actualizar();
        } else {
            $this->crear();
        }
    }

    //Guardamos los datos ya saneados
    public function crear()
    {

        //Sanear Entrada
        $atributos = $this->sanearDatos();

        // Insertar en la base de datos
        $query = " INSERT INTO " . static::$tabla . " ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' ";
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";

        // Resultado de la consulta
        $result = self::$db->query($query);

        if ($result) {
            //Redireccionamos
            header("Location: /admin?msg=1");
        }
    }
    public function actualizar()
    {
        //Sanear Entrada
        $atributos = $this->sanearDatos();
        $values = [];

        foreach ($atributos as $key => $value) {
            $values[] = "{$key}='{$value}'";
        }
        $query = " UPDATE " . static::$tabla . " SET ";
        $query .= join(', ', $values);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";

        $result = self::$db->query($query);

        if ($result) {
            //Redireccionamos
            header("Location: /admin?msg=2");
        }
    }
    //Eliminar inmuebles
    public function eliminar()
    {
        $query = " DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1 ";
        $result = self::$db->query($query);

        if ($result) {
            $this->borrarImagen();
            header("Location: /admin?msg=3");
        }
    }


    //Array de los atributos para sanearlos
    public function atributos()
    {
        $atributos = [];
        foreach (static::$columnasdb as $columna) {
            if ($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }
    public function sanearDatos()
    {
        $atributos = $this->atributos();
        $saneado = [];

        /* Saneamiento de datos. */
        foreach ($atributos as $key => $value) {
            $saneado[$key] = self::$db->escape_String($value);
        }
        return $saneado;
    }
    //Subir Imagenes
    public function setImagen($imagen)
    {
        if (!is_null($this->id)) {
            $this->borrarImagen();
        }

        //Asignamos al atributo el nombre de la imagen
        if ($imagen) {
            $this->imagen = $imagen;
        }
    }
    public function borrarImagen()
    {
        //Eliminamos la imagen previa 
        if (isset($this->id)) {
            $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
            if ($existeArchivo) {
                unlink(CARPETA_IMAGENES . $this->imagen);
            }
        }
    }


    //Devuelven todos los objetos inmueble en la BBDD
    public static function all()
    {
        $query = "SELECT * FROM " . static::$tabla;

        $result = self::consultarBD($query);

        return $result;
    }

    //Encuentra un inmueble por su ID
    public static function find($id)
    {
        $query = "SELECT * FROM " . static::$tabla . " WHERE id = ${id}";
        $result = self::consultarBD($query);
        return array_shift($result);
    }

    //Consulta la BBDD con una query pasada por el parametro
    public static function consultarBD($query)
    {
        //Consultar BBD
        $result = self::$db->query($query);
        //Iterar
        $array = [];
        while ($dato = $result->fetch_assoc()) {
            $array[] = static::crearObjeto($dato);
        }
        //Liberar
        $result->free();
        //Retorno
        return $array;
    }
    //Recibe un parametro tipo array y lo convierte en objeto
    protected static function crearObjeto($dato)
    {
        $objeto = new static;
        foreach ($dato as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }
    //Sincroniza los datos en memoria con los de la BBDD
    public function sinc($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
}
