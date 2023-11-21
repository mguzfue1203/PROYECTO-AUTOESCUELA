<?php
//Si el usuario no está logueado nos redirigirá al inicio.
if (!Login::usuarioestalogueado()) {
    header("Location: ./index.php?menu=inicio");
    exit;
}
if (Login::rolusuariolog() != 'administrador' && Login::rolusuariolog() != 'profesor') {
    header("Location: ./index.php?menu=inicio");
    exit;
}

?>
<!--BODY-->
<article class="articlefoto">
    <section class="section100imgexamenes">

        <p class="titulosection">Panel de Exámenes</p>

    </section>
    <section class="section100">

        <p class="titulosection2">En construcción</p>

    </section>
    <section class="section100examenes">
        
        <table class="tablaexamenes">
            <thead>
                <tr>    
                    <th>Preguntas</th>
                    <th>Respuestas</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!--Aqui voy a pintar a todos los exámenes-->
            </tbody>
        </table>
        
    </section>
    <section class="section100admin2">

    </section>
    <section class="section100admin2">

    </section>

</article>
    