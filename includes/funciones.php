<?php

function debuguear($variable): string
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapa / Sanitizar el HTML
function s($html): string
{
    $s = htmlspecialchars($html);
    return $s;
}
// Muestra los mensajes

function mostrarNotificacion($codigo)
{
    $mensaje = '';

    switch ($codigo) {
        case 1:
            $mensaje = '¡¡Creado Correctamente!!';
            break;
        case 2:
            $mensaje = '¡¡Actualizado Correctamente!!';
            break;
        case 3:
            $mensaje = '¡¡Eliminado Correctamente!!';
            break;
        case 4:
            $mensaje = '¡¡No Se Pudo Eliminar!!';
            break;
        default:
            $mensaje = false;
            break;
    }
    return $mensaje;
}

function validarORedireccionar(string $url)
{
    //Validar que sea un ID valido
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header("Location: {$url}");
    }
    return $id;
}