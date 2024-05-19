<?php
if ($resultado) {
    $mensaje = mostrarNotificacion(intval($resultado));
    if ($mensaje) { ?>
        <p class="alerta exito"> <?php echo s($mensaje) ?> </p>
<?php }
} ?>
<a href="/usuario/crear" class="boton boton-verde">Nuevo Usuario</a>
<h2>Usuarios</h2>
<div class="tabla-container">
    <table class="propiedades" id="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Nombre Usuario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody><!--Mostrar los Resultados--->
            <?php foreach ($usuario as $usu) : ?>
                <tr>
                    <td><?php echo $usu->id; ?></td>
                    <td><?php echo $usu->nombre; ?></td>
                    <td><?php echo $usu->apellidos; ?></td>
                    <td><?php echo $usu->email; ?></td>
                    <td><?php echo $usu->telefono; ?></td>
                    <td><?php echo $usu->nombreUs; ?></td>
                    <td>
                        <form method="POST" class="w-100" action="/usuario/eliminar">
                            <input type="hidden" name="id" value="<?php echo $usu->id; ?>">
                            <input type="hidden" name="tipo" value="usuario">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <div class="w-100">
                            <a href="/usuario/actualizar?id=<?php echo $usu->id; ?>" class="boton-azul-block">Actualizar</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>