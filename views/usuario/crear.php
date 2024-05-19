<h1 class="nombre-pagina">Crear Usuario</h1>

<?php include_once __DIR__ . "/../templates/alertas.php"; ?>

<form action="/usuario/crear" class="formulario" method="POST">
    <fieldset>
        <?php include_once __DIR__ . "/formulario.php"; ?>
        <input type="submit" value="Crear usuario" class=" boton boton-verde">
    </fieldset>
</form>
