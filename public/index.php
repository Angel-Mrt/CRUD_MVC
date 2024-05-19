<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\UsuarioController;
use MVC\Router;

$router = new Router();

// index
$router->get('/', [UsuarioController::class, 'index']);
$router->post('/', [UsuarioController::class, 'index']);

//Crear un Usuario

$router->get('/usuario/crear', [UsuarioController::class, 'crear']);
$router->post('/usuario/crear', [UsuarioController::class, 'crear']);

//Actualizar un usuario
$router->get('/usuario/actualizar', [UsuarioController::class, 'actualizar']);
$router->post('/usuario/actualizar', [UsuarioController::class, 'actualizar']);

//Eliminar un Usuario
$router->post('/usuario/eliminar', [UsuarioController::class, 'eliminar']);


// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
