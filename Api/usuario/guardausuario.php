<?php
require_once '../../auto/Autocargador.php';
if ($_SERVER['REQUEST_METHOD']=='POST'){
    $datos = json_decode(file_get_contents('php://input'), true);

    // Guarda los datos del nuevo usuario en la base de datos
    $nombre = $datos['nombre'];
    $dni = $datos['dni'];
    $apellido1 = $datos['apellido1'];
    $apellido2 = $datos['apellido2'];
    $fechanacimiento = $datos['fechanacimiento'];
    $contrasena = md5($datos['contrasena']);
    $email = $datos['email'];
    $rol = $datos['rol'];

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
echo json_encode(['success' => $datosusuario]);

} else {

    http_response_code(400);


}
?>