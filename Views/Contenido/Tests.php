<?php
//--REQUIRES-------------------------------
require_once './helpers/login.php';
//Si el usuario no está logueado nos redirigirá al inicio.
if (!Login::usuarioestalogueado()) {
    header("Location: ./index.php?menu=inicio");
    exit;
}

?>
<!--BODY-->
<div class="body">
<h1>Página de Tests</h1>
<p>Esta es la página de Tests.</p>
<a href='index.php?menu=inicio'>Ir a la página de inicio</a>
<a href='index.php?menu=paneladmin'>Ir a panel admin</a>
<form action="index.php?menu=logout" method="post">
    <input type="submit" value="Cerrar Sesión">
    </form>
</div>