<fieldset>
    <legend>Informacion General</legend>
    <label for="titulo">Nombre del Inmueble:</label>
    <input type="text" id="titulo" name="inmueble[titulo]" placeholder="Nombre Inmueble" value="<?php echo esc($inmueble->titulo); ?>">

    <label for="precio">Precio:</label>
    <input type="number" id="precio" name="inmueble[precio]" placeholder="Precio Inmueble" value="<?php echo esc($inmueble->precio); ?>">

    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" name="inmueble[imagen]" accept="image/jpeg, image/png">

    <?php if ($inmueble->imagen) : ?>
        <img src="../../imagenes/<?php echo $inmueble->imagen ?>" class="imagen-thum">
    <?php endif; ?>

    <label for="descripcion">Descripcion</label>
    <textarea id="descripcion" name="inmueble[descripcion]"><?php echo esc($inmueble->descripcion); ?></textarea>
</fieldset>
<fieldset>
    <legend>Informacion del Inmueble</legend>

    <label for="habitaciones">Habitaciones:</label>
    <input type="number" id="habitaciones" name="inmueble[habitaciones]" placeholder="Numero Habitaciones" value="<?php echo esc($inmueble->habitaciones); ?>" min="1">

    <label for="baños">Baños:</label>
    <input type="number" id="baños" name="inmueble[baños]" placeholder="Numero Baños" value="<?php echo esc($inmueble->baños); ?>" min="1">

    <label for="aparcamiento">Plazas de Aparcamiento:</label>
    <input type="number" id="aparcamiento" name="inmueble[aparcamiento]" placeholder="Numero Aparcamiento" value="<?php echo esc($inmueble->aparcamiento); ?>" min="0">
</fieldset>
<fieldset>
    <legend>Informacion del Vendedor</legend>

    <select name="inmueble[vendedores_id]" id="vendedor">
        <option selected value="">-- Selecciona --</option>
        <?php foreach ($vendedores as $vendedor) { ?>

            <option <?php echo $inmueble->vendedores_id === $vendedor->id ? 'selected' : '' ?> value="<?php echo esc($vendedor->id); ?>"><?php echo esc($vendedor->nombre) . " " . esc($vendedor->apellidos); ?>

            <?php } ?>
    </select>
</fieldset>