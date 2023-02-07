<main class="contenedor seccion">
    <h1>Contacto</h1>
    <?php
    if ($estado) {
        echo "<p class='alerta exito'>" . $estado . "</p>";
    }; ?>

    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="imagen oficina">
    </picture>
    <h2>Rellene el formulario de contacto</h2>
    <form class="formulario" action="/contacto" method="POST">
        <fieldset>
            <legend>Informacion Personal</legend>
            <label>Nombre</label>
            <input type="text" placeholder="Tu nombre" id="nombre" name="form[nombre]" required>

            <label>Apellidos</label>
            <input type="text" placeholder="Tus apellidos" id="apellidos" name="form[apellidos]" required>

            <label>E-mail</label>
            <input type="email" placeholder="Tu Email" id="email" name="form[email]" required>

            <label>Telefono</label>
            <input type="tel" placeholder="Tu telefono" id="telefono" name="form[telefono]" required>

            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="form[mensaje]"></textarea>
        </fieldset>
        <fieldset>
            <legend>Informacion sobre el inmueble</legend>
            <label for="opciones"> Compra o venta:</label>
            <select id="opciones" name="form[compraventa]" required>
                <option value="" disabled selected>--Selecion--</option>
                <option value="Compra">Compra</option>
                <option value="Venta">Venta</option>
            </select>

            <label>Presupuesto</label>
            <input type="number" placeholder="Tu presupuesto" id="presupuesto" name="form[presupuesto]">
        </fieldset>
        <fieldset>
            <legend>Contacto</legend>
            <p>Como quiere que le contactemos:</p>
            <div class="forma-contacto">
                <label for="contactar-telefono">Telefono</label>
                <input type="radio" value="contactar-telefono" name="form[viaContacto]" required>
                <label for="contactar-email">E-mail</label>
                <input type="radio" value="contactar-email" name="form[viaContacto]" required>
            </div>
            <p>Diganos una fecha y hora segun su disponibilidad.</p>

            <label>Fecha</label>
            <input type="date" placeholder="Tu fecha disponible" id="fecha" name="form[fecha]">
            <label>Hora</label>
            <input type="time" placeholder="Tu hora disponible" id="hora" min="09:00" max="20:00" name="form[hora]" required>
        </fieldset>

        <input type="submit" class="boton-verde">
    </form>
</main>