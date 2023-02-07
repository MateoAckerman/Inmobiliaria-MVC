<main class="contenedor seccion">
    <h1>Panel Administrador </h1>

    <?php
    if ($msg) {
        $notificacion = notificaciones(intval($msg));

        if ($notificacion) { ?>
            <p class="alerta exito"> <?php echo esc($notificacion) ?></p>
    <?php }
    } ?>

    <div class="delimitador">
        <a class="boton boton-verde-panel b-icon" href=" /inmuebles/create"> Nuevo inmueble <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                <path d="M13 23l-9.983-.014v-9.979l8.974-7.995c1.124.999 2.25 1.998 3.378 2.998l2.255 1.999c1.127.999 2.252 1.992 3.376 2.991v10l-5.993-.014-.007-4.986h-2v5zm6-2l.019-7.121-7.028-6.193-6.991 6.218v7.096h6v-5h6v5h2zm-10-5v3h-2v-3h2zm3-15l12 10.654-1.328 1.494-10.672-9.488-10.672 9.488-1.328-1.494 12-10.654z" />
            </svg></a>
        <a class="boton boton-verde-panel b-icon" href=" /vendedores/create">Nuevo empleado <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M24 4h-7v2h7v-2zm0 4h-7v2h7v-2zm0 4h-7v2h7v-2zm-4 9.193v.807h-2v-.984c0-1.329.085-1.713-1.208-2.013-2.479-.572-4.822-1.112-5.714-3.067-.333-.728-.556-1.921.266-3.473 1.646-3.109 2.075-5.746 1.179-7.235-.644-1.069-1.856-1.228-2.523-1.228-.672 0-1.896.163-2.546 1.254-.9 1.511-.464 4.132 1.194 7.191.839 1.547.622 2.744.292 3.476-.887 1.966-3.318 2.526-5.67 3.068-1.348.309-1.27.675-1.27 2.011v1h-1.996l-.004-.833c-.009-2.224.088-3.495 2.647-4.086 2.805-.647 5.573-1.227 4.242-3.682-3.943-7.275-1.123-11.399 3.111-11.399 4.154 0 7.042 3.971 3.111 11.398-1.292 2.44 1.375 3.02 4.242 3.682 2.569.594 2.657 1.873 2.647 4.113z" />
            </svg></a>
    </div>
    <h2>Inmuebles Disponibles</h2>
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <!--Mostrar listado de inmuebles-->
            <?php foreach ($inmuebles as $inmueble) : ?>
                <tr>
                    <td><?php echo $inmueble->id; ?></td>
                    <td><?php echo $inmueble->titulo; ?></td>
                    <td class="imagen-td"><img src="/imagenes/<?php echo $inmueble->imagen; ?>" class="imagen-tabla"></td>
                    <td><?php echo $inmueble->precio; ?>€</td>
                    <td>
                        <div class="botones-td">
                            <a href=" /inmuebles/actualizar?id=<?php echo $inmueble->id; ?>" class="boton boton-amarillo-block-panel"><svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m19 20.25c0-.402-.356-.75-.75-.75-2.561 0-11.939 0-14.5 0-.394 0-.75.348-.75.75s.356.75.75.75h14.5c.394 0 .75-.348.75-.75zm-12.023-7.083c-1.334 3.916-1.48 4.232-1.48 4.587 0 .527.46.749.749.749.352 0 .668-.137 4.574-1.493zm1.06-1.061 3.846 3.846 8.824-8.814c.195-.195.293-.451.293-.707 0-.255-.098-.511-.293-.706-.692-.691-1.742-1.741-2.435-2.432-.195-.195-.451-.293-.707-.293-.254 0-.51.098-.706.293z" fill-rule="nonzero" />
                                </svg></a>
                            <form method="POST" class="w-100" action="/inmuebles/eliminar">
                                <input type="hidden" name="id" value="<?php echo $inmueble->id; ?>">
                                <input type="hidden" name="tipo" value="inmueble">
                                <label class="boton-rojo-block-panel">
                                    <input type="submit" class="boton-hide" />
                                    <svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="m4.015 5.494h-.253c-.413 0-.747-.335-.747-.747s.334-.747.747-.747h5.253v-1c0-.535.474-1 1-1h4c.526 0 1 .465 1 1v1h5.254c.412 0 .746.335.746.747s-.334.747-.746.747h-.254v15.435c0 .591-.448 1.071-1 1.071-2.873 0-11.127 0-14 0-.552 0-1-.48-1-1.071zm14.5 0h-13v15.006h13zm-4.25 2.506c-.414 0-.75.336-.75.75v8.5c0 .414.336.75.75.75s.75-.336.75-.75v-8.5c0-.414-.336-.75-.75-.75zm-4.5 0c-.414 0-.75.336-.75.75v8.5c0 .414.336.75.75.75s.75-.336.75-.75v-8.5c0-.414-.336-.75-.75-.75zm3.75-4v-.5h-3v.5z" fill-rule="nonzero" />
                                    </svg>
                                </label>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Empleados en Activo</h2>
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <!--Mostrar listado de empleados-->
            <?php foreach ($vendedores as $vendedor) : ?>
                <tr>
                    <td><?php echo $vendedor->id; ?></td>
                    <td><?php echo $vendedor->nombre; ?></td>
                    <td><?php echo $vendedor->apellidos; ?></td>
                    <td><?php echo $vendedor->telefono; ?></td>
                    <td>
                        <div class="botones-td">
                            <a href="/vendedores/actualizar?id=<?php echo $vendedor->id; ?>" class="boton boton-amarillo-block-panel"><svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m19 20.25c0-.402-.356-.75-.75-.75-2.561 0-11.939 0-14.5 0-.394 0-.75.348-.75.75s.356.75.75.75h14.5c.394 0 .75-.348.75-.75zm-12.023-7.083c-1.334 3.916-1.48 4.232-1.48 4.587 0 .527.46.749.749.749.352 0 .668-.137 4.574-1.493zm1.06-1.061 3.846 3.846 8.824-8.814c.195-.195.293-.451.293-.707 0-.255-.098-.511-.293-.706-.692-.691-1.742-1.741-2.435-2.432-.195-.195-.451-.293-.707-.293-.254 0-.51.098-.706.293z" fill-rule="nonzero" />
                                </svg></a>
                            <form method="POST" class="w-100" action="/vendedores/eliminar">
                                <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                                <input type="hidden" name="tipo" value="vendedor">
                                <label class="boton-rojo-block-panel">
                                    <input type="submit" class="boton-hide">
                                    <svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="m4.015 5.494h-.253c-.413 0-.747-.335-.747-.747s.334-.747.747-.747h5.253v-1c0-.535.474-1 1-1h4c.526 0 1 .465 1 1v1h5.254c.412 0 .746.335.746.747s-.334.747-.746.747h-.254v15.435c0 .591-.448 1.071-1 1.071-2.873 0-11.127 0-14 0-.552 0-1-.48-1-1.071zm14.5 0h-13v15.006h13zm-4.25 2.506c-.414 0-.75.336-.75.75v8.5c0 .414.336.75.75.75s.75-.336.75-.75v-8.5c0-.414-.336-.75-.75-.75zm-4.5 0c-.414 0-.75.336-.75.75v8.5c0 .414.336.75.75.75s.75-.336.75-.75v-8.5c0-.414-.336-.75-.75-.75zm3.75-4v-.5h-3v.5z" fill-rule="nonzero" />
                                    </svg>

                                </label>
                            </form>
                        </div>


                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</main>