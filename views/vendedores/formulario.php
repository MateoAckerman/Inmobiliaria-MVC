<fieldset>
    <legend>Datos Generales</legend>
    <label for="nombre">Nombre del Empleado:</label>
    <input type="text" id="nombre" name="vendedor[nombre]" placeholder="Nombre " value="<?php echo esc($vendedor->nombre); ?>">
    <label for="apellidos">Apellidos del Empleado:</label>
    <input type="text" id="apellidos" name="vendedor[apellidos]" placeholder="Apellidos" value="<?php echo esc($vendedor->apellidos); ?>">
    <label for="telefono">Telefono de contacto:</label>
    <input type="tel" id="telefono" name="vendedor[telefono]" placeholder="Telefono" value="<?php echo esc($vendedor->telefono); ?>">
</fieldset>