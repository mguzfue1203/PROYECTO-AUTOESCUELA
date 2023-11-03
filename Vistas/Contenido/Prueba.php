<?php
require_once './helper/login.php';
//Si el usuario no está logueado nos redirigirá al inicio.
if (!Login::usuarioestalogueado()) {
    header("Location: ./index.php?menu=inicio");
    exit;
}

?>

<h1>Prueba</h1>
<p>Esta es una página de prueba.</p>
<a href='index.php?menu=inicio'>Ir a la página de inicio</a>