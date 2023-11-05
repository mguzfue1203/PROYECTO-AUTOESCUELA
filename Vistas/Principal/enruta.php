<?php
if (isset($_GET['menu'])) {
    $menu = $_GET['menu'];

    if ($menu === 'autentifica') {
        require_once './Vistas/Login/autentifica.php';
    }
    elseif ($menu === 'inicio') {
        require_once './Vistas/Contenido/Inicio.php';
    }
    elseif ($menu === 'prueba') {
        require_once './Vistas/Contenido/Prueba.php';
    }
    elseif ($menu === 'autentifica') {
        require_once './Vistas/Login/autentifica.php';
    }
    elseif ($menu === 'tests') {
        require_once './Vistas/Contenido/Tests.php';
    }
    elseif ($menu === 'registra') {
        require_once './Vistas/Login/registra.php';
    }
    elseif ($menu === 'logout') {
        require_once './Vistas/Login/cerrarsesion.php';
    }
    else {
        // Si no encuentra ninguna de estas opciones redirige a página no encontrada
        //require_once 'noencontrada.php';
    }
} else {
    //Si no le damos ninguna opción por defecto redirigirá al inicio de la web.
    require_once './Vistas/Contenido/Inicio.php';
}
