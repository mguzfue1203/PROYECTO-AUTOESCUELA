<?php
//Si el usuario no está logueado nos redirigirá al inicio.
if (!Login::usuarioestalogueado()) {
    header("Location: ./index.php?menu=inicio");
    exit;
}

?>
<!--BODY-->
<article class="articlefoto">
        <section class="section100imgtests">
                    <p class="titulosection">Tests</p>
        </section>
        <section class="section100">
        <h1>PRUEBA SECTION 100%</h1>
            
    </section>
</article>