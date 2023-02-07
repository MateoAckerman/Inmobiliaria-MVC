<main class="formulario-login">
    <h1 class="tituloLogin">Bienvenido</h1>
    <picture>
        <source srcset="/build/img/iconoUsuario.webp" type="image/webp">
        <source srcset="/build/img/iconoUsuario.png" type="image/jpeg">
        <img loading="lazy" src="/build/img/iconoUsuario.png" alt="Icono User">
    </picture>
    <?php
    foreach ($errores as $error) :
    ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php
    endforeach;
    ?>

    <form method="POST" class='login-form' action="/login">

        <div class="flex-row">
            <label for="email"></label>
            <input id="email" name="email" class='formInput' placeholder='E-mail' type='email' required>
        </div>
        <div class="flex-row">
            <label for="contraseña"></label>
            <input id="contraseña" name="contraseña" class='formInput' placeholder='Contraseña' type='password' required>
        </div>
        <input class='boton-submit' type='submit' value='LOGIN'>

    </form>


</main>