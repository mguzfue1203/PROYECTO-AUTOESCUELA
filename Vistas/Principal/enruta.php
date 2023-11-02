<?php
if (isset($_POST['menu'])) {
    if ($_POST['menu'] == "login") {
        require_once 'index.php';
    }
    if ($_POST['menu'] == "submit") {
        require_once './Vistas/Login/autentifica.php';
    }
    
} 
?>
