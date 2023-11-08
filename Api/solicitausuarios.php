<?php
require_once '../auto/Autocargador.php';

$usuarios = Usuario::obtenertodosusuarios();
var_dump($usuarios);
//resultados como un JSON

header('Content-Type: application/json');

echo json_encode($usuarios);

?>