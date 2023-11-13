<?php
require_once '../auto/Autocargador.php';
if ($_SERVER['REQUEST_METHOD']=='POST'){
    $data = json_decode(file_get_contents('php://input'), true);

    // Guarda los datos del nuevo usuario en la base de datos
    $nombre = $data['nombre'];
    $dni = $data['dni'];
    $apellido1 = $data['apellido1'];
    $apellido2 = $data['apellido2'];
    $fechanacimiento = $data['fechanacimiento'];
    $contrasena = $data['contrasena'];
    $email = $data['email'];
    $rol = $data['rol'];
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
echo json_encode($datosusuario);
}
?>