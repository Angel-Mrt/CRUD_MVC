<legend>Informacion General</legend>

<div class="campo">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="usuario[nombre]" value="<?php echo s($usuario->nombre); ?>" placeholder="Tu Nombre">
</div>
<div class="campo">
    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="usuario[apellidos]" value="<?php echo s($usuario->apellidos); ?>" placeholder="Tu Apellido">
</div>
<div class="campo">
    <label for="telefono">Teléfono:</label>
    <input type="tel" id="telefono" name="usuario[telefono]" value="<?php echo s($usuario->telefono); ?>" placeholder="Tu Teléfono">
</div>
<div class="campo">
    <label for="email">Email:</label>
    <input type="email" id="email" name="usuario[email]" value="<?php echo s($usuario->email); ?>" placeholder="Tu Email">
</div>
<div class="campo">
    <label for="nombreUs">Nombre de Usuario:</label>
    <input type="nombreUs" id="nombreUs" name="usuario[nombreUs]" placeholder="Tu Nombre de usuario">
</div>
<div class="campo">
    <label for="contrasenia">Contraseña:</label>
    <input type="contrasenia" id="contrasenia" name="usuario[contrasenia]" placeholder="Tu Contraseña">
</div>