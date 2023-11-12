<?php
require_once '../auto/Autocargador.php';
if ($_SERVER['REQUEST_METHOD']=='GET'){

$usuarios = repousuarios::obtenertodosusuarios();

$arrayusuarios = [];

foreach ($usuarios as $usuario) {

    $datoscadausuario = [

        'nombre' => $usuario -> getNombre(),
        'dni' => $usuario -> getDni(),
        'apellido1' => $usuario -> getApellido1(),
        'apellido2' => $usuario -> getApellido2(),
        'fechanacimiento' => $usuario -> getFechanacimiento(),
        'contrasena' => $usuario -> getContrasena(),
        'email' => $usuario -> getEmail(),
        'rol' => $usuario -> getRol(),

    ];

    $arrayusuarios[] = $datoscadausuario;
}

header('Content-Type: application/json');
echo json_encode($arrayusuarios);
}
?>