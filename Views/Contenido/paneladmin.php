<?php
//Si el usuario no está logueado nos redirigirá al inicio.
if (!Login::usuarioestalogueado()) {
    header("Location: ./index.php?menu=inicio");
    exit;
}
if (Login::rolusuariolog() != 'administrador'){
    header("Location: ./index.php?menu=inicio");
    exit;
}

?>
<!--BODY-->
<article class="articlefoto">
    <section class="section100imgadmin">

        <p class="titulosection">Panel de Administrador</p>

    </section>
    <section class="section100admin">
        <table class="tablaadmin">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>DNI</th>
                    <th>Apellido 1</th>
                    <th>Apellido 2</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Contraseña</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                    <!--<th id="mostrarusers">
                        <form id="adminform" method="get" action="">
                            <button type="submit" id="btnusuarios" name="cargarusuarios">Mostrar Usuarios</button>                            
                        </form>
                    </th>-->
                </tr>
            </thead>
            <tbody>
                <!--Aqui voy a pintar a todos los usuarios-->
            </tbody>
        </table>
        
    </section>
    <section class="section100admin3">

    </section>
    <section class="section100mensaje">
        <p>Si deseas crear nuevos tests, o preguntas de exámen, puedes ir al panel de administración de exámenes aquí: </p>
                                    <form action="index.php?menu=panelexamenes" method="post" id="botonmensaje">
                                        <label for="submit"></label>
                                        <input type="submit" value="Ir a Exámenes" name="btnexam" id="btnexam">
                                    </form>
    </section>
</article>
    