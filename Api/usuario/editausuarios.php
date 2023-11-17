<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datos = json_decode(file_get_contents('php://input'), true);

    if (isset($datos['dni'])) {
        $nombre = $datos['nombre'];
        $dni = $datos['dni'];
        $apellido1 = $datos['apellido1'];
        $apellido2 = $datos['apellido2'];
        $fechanacimiento = $datos['fechanacimiento'];
        $contrasena = md5($datos['contrasena']); 
        $email = $datos['email'];
        $rol = $datos['rol'];

        $resultado = repousuarios::editarusuario($nombre, $dni, $apellido1, $apellido2, $fechanacimiento, $contrasena, $email, $rol);

        if ($resultado) {
            http_response_code(200);
            echo json_encode(['mensaje' => 'Usuario editado correctamente']);
        } else {
            http_response_code(400);
            echo json_encode(['error' => 'Error al editar el usuario']);
        }
    }
}
?>