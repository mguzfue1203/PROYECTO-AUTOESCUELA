<?php
require_once '../auto/Autocargador.php';
if ($_SERVER['REQUEST_METHOD']=='GET'){

$usuarios = repousuarios::guardarusuario($nombre, $dni, $apellido1, $apellido2, $fechanacimiento, $contrasena, $email, $rol);


    $datosusuario = [

        'nombre' => $usuario -> getNombre(),
        'dni' => $usuario -> getDni(),
        'apellido1' => $usuario -> getApellido1(),
        'apellido2' => $usuario -> getApellido2(),
        'fechanacimiento' => $usuario -> getFechanacimiento(),
        'contrasena' => $usuario -> getContrasena(),
        'email' => $usuario -> getEmail(),
        'rol' => $usuario -> getRol(),

    ];

    $datosusuario;


header('Content-Type: application/json');
echo json_encode($datosusuarios);
}
?>