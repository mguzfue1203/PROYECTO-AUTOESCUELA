<?php
require_once './Classes/usuario.php';
require_once './helpers/gbd.php';

$usuarios = Usuario::obtenertodosusuarios();

//resultados como un JSON
header('Content-Type: application/json');
echo json_encode($usuarios);
?>