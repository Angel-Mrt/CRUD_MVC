<?php

namespace Model;

class Usuario extends ActiveRecord
{

    // Base de Datos
    protected static $tabla = "usuarios";
    protected static $columnasDB = [
        'id', 'nombre', 'apellidos', 'email', 'telefono',
        'nombreUs', 'contrasenia'
    ];

    public $id;
    public $nombre;
    public $apellidos;
    public $email;
    public $telefono;
    public $nombreUs;
    public $contrasenia;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellidos = $args['apellidos'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->nombreUs = $args['nombreUs'] ?? '';
        $this->contrasenia = $args['contrasenia'] ?? '0';
    }

    //Mensajes de Validacion para la creacion de la cuenta
    public function validarNuevaCuenta()
    {
        if (!$this->nombre) {
            self::$alertas['error'][] =  'El Nombre es Obligatorio';
        }
        if (!$this->apellidos) {
            self::$alertas['error'][] =  'El Apellido es Obligatorio';
        }
        if (!$this->email) {
            self::$alertas['error'][] =  'El Email es Obligatorio';
        }
        if (!$this->telefono) {
            self::$alertas['error'][] =  'El Telefono es Obligatorio';
        }
        if (!$this->nombreUs) {
            self::$alertas['error'][] =  'El Nombre de usuario es Obligatorio';
        }
        if (strlen($this->contrasenia) < 8) {
            self::$alertas['error'][] =  'El Contraseña debe tener al menos 8 Caracteres';
        }
        // if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $this->contrasenia)) {
        //     self::$alertas['error'][] =  'El Password debe tener al menos una letra Minuscula y Mayuscula y un numero ';
        // }

        return self::$alertas;
    }
    //Mensajes de Validacion para la creacion de la cuenta
    public function validarActualizacionCuenta()
    {
        if (!$this->nombre) {
            self::$alertas['error'][] =  'El Nombre es Obligatorio';
        }
        if (!$this->apellidos) {
            self::$alertas['error'][] =  'El Apellido es Obligatorio';
        }
        if (!$this->email) {
            self::$alertas['error'][] =  'El Email es Obligatorio';
        }
        if (!$this->telefono) {
            self::$alertas['error'][] =  'El Telefono es Obligatorio';
        }
        if (!preg_match('/^\d{10}$/', $this->telefono)) {
            self::$alertas['error'][] = 'El Teléfono es inválido';
        }
        if (!$this->nombreUs) {
            self::$alertas['error'][] =  'El Nombre de Usuario es Obligatorio';
        }

        // if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $this->contrasenia)) {
        //     self::$alertas['error'][] =  'El Password debe tener al menos una letra Minuscula y Mayuscula y un numero ';
        // }

        return self::$alertas;
    }

    public function validarLogin()
    {
        if (!$this->email) {
            self::$alertas['error'][] = 'El Email es Oblogatorio';
        }
        if (!$this->contrasenia) {
            self::$alertas['error'][] = 'El Password es Obligatorio';
        }
        return self::$alertas;
    }
    public function validarPassword()
    {
        if (!$this->contrasenia) {
            self::$alertas['error'][] = 'El Password es Obligatorio';
        }
        if (strlen($this->contrasenia) < 8) {
            self::$alertas['error'][] = 'El Password debe tener al menos 8 caracteres';
        }
        return self::$alertas;
    }

    public function validarEmail()
    {
        if (!$this->email) {
            self::$alertas['error'][] = 'El Email es Obligatorio';
        }
        return self::$alertas;
    }

    // Revisa si el usuario ya existe 
    public function existeUsuario()
    {
        $query = " SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";

        $resultado = self::$db->query($query);

        if ($resultado->num_rows) {
            self::$alertas['error'][] = 'El Usuario ya esta registrado';
        }
        return $resultado;
    }
    public function hashPassword()
    {
        $this->contrasenia = password_hash($this->contrasenia, PASSWORD_BCRYPT);
    }
}
