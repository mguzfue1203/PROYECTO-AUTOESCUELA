<?php
// editausuarios.php

// Verificar si la solicitud es POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Obtener el cuerpo de la solicitud como JSON
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    // Verificar si se proporcionó el campo 'dni' en la solicitud JSON
    if (isset($data['dni'])) {
        // Obtener los datos del formulario JSON
        $nombre = $data['nombre'];
        $dni = $data['dni'];
        $apellido1 = $data['apellido1'];
        $apellido2 = $data['apellido2'];
        $fechanacimiento = $data['fechanacimiento'];
        $contrasena = md5($data['contrasena']); // Nota: esto es una práctica insegura, deberías considerar el uso de funciones de hash más seguras
        $email = $data['email'];
        $rol = $data['rol'];

        // Llamar a tu función de edición de usuario
        $resultado = repousuarios::editarusuario($nombre, $dni, $apellido1, $apellido2, $fechanacimiento, $contrasena, $email, $rol);

        // Verificar el resultado y responder en consecuencia
        if ($resultado) {
            // Éxito
            http_response_code(200);
            echo json_encode(['mensaje' => 'Usuario editado correctamente']);
        } else {
            // Fallo
            http_response_code(500);
            echo json_encode(['error' => 'Error al editar el usuario']);
        }
    } else {
        // 'dni' no proporcionado en la solicitud JSON
        http_response_code(400);
        echo json_encode(['error' => 'El campo "dni" es obligatorio']);
    }
} else {
    // Método no permitido
    http_response_code(405);
    echo json_encode(['error' => 'Método no permitido']);
}
?>