<?php
require_once '../auto/Autocargador.php';

if ($_SERVER['REQUEST_METHOD']=='GET'){

    $usuarios = Usuario::obtenertodosusuarios();
    var_dump($usuarios);
    //resultados como un JSON
    
    header('Content-Type: application/json');
    echo json_encode($usuarios);




}
?>