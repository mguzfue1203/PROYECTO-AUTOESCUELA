<?php
if (isset($_GET['menu'])) {
    $menu = $_GET['menu'];

    if ($menu === 'autentifica') {
        require_once './Views/Login/autentifica.php';
    }
    elseif ($menu === 'inicio') {
        require_once './Views/Contenido/Inicio.php';
    }
    elseif ($menu === 'prueba') {
        require_once './Views/Contenido/Prueba.php';
    }
    elseif ($menu === 'autentifica') {
        require_once './Views/Login/autentifica.php';
    }
    elseif ($menu === 'tests') {
        require_once './Views/Contenido/Tests.php';
    }
    elseif ($menu === 'registra') {
        require_once './Views/Login/registra.php';
    }
    elseif ($menu === 'logout') {
        require_once './Views/Login/cerrarsesion.php';
    }
    elseif ($menu === 'paneladmin') {
        require_once './Views/Contenido/paneladmin.php';
    }
    elseif ($menu === 'panelexamenes') {
        require_once './Views/Contenido/panelexamenes.php';
    }
   
    else {
        // Si no encuentra ninguna de estas opciones redirige a página no encontrada
        require_once './Views/Contenido/noencontrada.php';
    }
} else {
    //Si no le damos ninguna opción por defecto redirigirá al inicio de la web.
    require_once './Views/Contenido/Inicio.php';
}
