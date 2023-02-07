<?php

namespace Model;

class Inmueble extends Raiz
{
    protected static $tabla = 'inmuebles';
    protected static $columnasdb = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'baños', 'aparcamiento', 'creado', 'vendedores_id'];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $baños;
    public $aparcamiento;
    public $creado;
    public $vendedores_id;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->baños = $args['baños'] ?? '';
        $this->aparcamiento = $args['aparcamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedores_id = $args['vendedores_id'] ?? '';
    }

    //Validacion de las entradas de los formularios
    public function validarDatos()
    {
        if (!$this->titulo) {
            self::$errores[] = "Debes añadir un titulo";
        }
        if (!$this->precio) {
            self::$errores[] = "El precio es obligatorio";
        }
        if (strlen($this->descripcion) < 50) {
            self::$errores[] = "Debes añadir una descripcion y debe tener al menos 50 caracteres";
        }
        if (!$this->habitaciones) {
            self::$errores[] = "Debes añadir el numero de habitaciones";
        }
        if (!$this->aparcamiento) {
            self::$errores[] = "Debes añadir el numero de aparcamientos";
        }
        // if (!$this->vendedores_id) {
        //     self::$errores[] = "Debes seleccionar un vendedor";
        // }
        if (!$this->imagen) {
            self::$errores[] = 'La imagen es obligatoria';
        }

        return self::$errores;
    }

    //Obtener numero de Inmuebles
    public static function getInmuebles($max)
    {
        $query = "SELECT * FROM " . static::$tabla . " ORDER BY RAND() LIMIT " . $max;

        $result = self::consultarBD($query);

        return $result;
    }
}
