<?php

namespace Controllers;

use Model\Usuario;
use MVC\Router;

class UsuarioController
{
    public static function index(Router $router)
    {
        //$usuario = new Usuario()

        $usuario = Usuario::all();
        // Muestra Mensaje condicional
        $resultado = $_GET['resultado'] ?? null;

        $router->render(
            'index',
            [
                'usuario' => $usuario,
                'resultado' => $resultado
            ]
        );
    }
    public static function crear(Router $router)
    {
        $usuario = new Usuario;

        //Alertas Vacias
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();

            // Revisar que alerta este vacia
            if (empty($alertas)) {
                // Verificar que el usuario no este registrado
                $resultado = $usuario->existeUsuario();

                if ($resultado->num_rows) {
                    $alertas = Usuario::getAlertas();
                } else {
                    // Hasear el Password
                    $usuario->hashPassword();

                    //Crear el usuario
                    $resultado = $usuario->guardar();

                    if ($resultado) {
                        header('Location: /?resultado=1');
                    }
                }
            }
        }

        $router->render(
            'usuario/crear',
            [
                'usuario' => $usuario,
                'alertas' => $alertas
            ]
        );
    }

    public static function actualizar(Router $router)
    {
        $id = validarORedireccionar('/');
        $usuario = Usuario::find($id);
        //arreglo con mensajes de alertas
        $alertas = Usuario::getAlertas();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Asignar los valores
            $args = $_POST['usuario'];
            // Sincroniza el objeto en memoria con lo que el usuario escribio
            $usuario->sincronizar($args);
            // validacion
            $alertas = $usuario->validarActualizacionCuenta();

            if (empty($alertas)) {
                //Crear el usuario
                $resultado = $usuario->guardar();
                if ($resultado) {
                    header('Location: /?resultado=2');
                }
            }
        }
        $router->render('usuario/actualizar', [
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }
    public static function eliminar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validar Id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if ($id) {
                $usuario = Usuario::find($id);
                $usuario->eliminar();

                // Redirigir a la página de administración con resultado exitoso
                header('location: /?resultado=3');
            }
        }
    }
}
