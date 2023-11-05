<?php
//--REQUIRES-------------------------------


?>
<!--BODY-->
<h1>Bienvenido a la página de inicio</h1>
    <p>Esta es la página de inicio </p>
    <a href='index.php?menu=prueba'>Ir a la página de Prueba</a>
    <a href='index.php?menu=autentifica'>Ir a la página de login</a>
    <form action="index.php?menu=logout" method="post">
    <input type="submit" value="Cerrar Sesión">
    </form>