<?php
//--REQUIRES-------------------------------
require_once './helper/sesion.php';

//Iniciamos la sesión si no lo está.
Sesion::iniciar();
//Si la cookie del usuario existe, la eliminamos con un tiempo pasado de su propia existencia.
if (isset($_COOKIE['usuario'])) {
    setcookie('usuario', '', time() - 3600, "/");
}
//Eliminamos la sesión del usuario.
Sesion::eliminar('usuario');
//Redirigimos a inicio.
header("location: ?menu=inicio");
?>