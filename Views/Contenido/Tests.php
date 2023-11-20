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
        <section class="section100admin3">

</section>
        <section class="section100admin2" id="examen">
        <button id="empezar">Comenzar</button>


    </section>
    <section class="section100admin3">

    </section>
</article>