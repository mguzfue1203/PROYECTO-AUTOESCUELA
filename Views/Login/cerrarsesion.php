<?php
//--REQUIRES-------------------------------

//Iniciamos la sesión si no lo está.
Sesion::iniciar();
//Si la cookie del usuario existe, la eliminamos con un tiempo pasado de su propia existencia.
if (isset($_COOKIE['dni'])) {
    setcookie('dni', '', time() - 3600, "/");
}
//Eliminamos la sesión del usuario.
Sesion::eliminar('usuario');
//Redirigimos a inicio.
header("location: ?menu=inicio");
?>