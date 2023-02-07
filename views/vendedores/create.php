<main class="contenedor seccion log">
    <h1>Crear Empleado</h1>
    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
    <form class="formulario" method="POST" enctype="multipart/form-data" action="/vendedores/create">

        <?php include __DIR__ . '/formulario.php'; ?>

        <div class="botonesCrud">
            <a class="boton boton-verde-block" onclick="history.back()">Volver</a>
            <input type="submit" value="Crear Empleado" class="boton boton-verde">
        </div>

    </form>
</main>