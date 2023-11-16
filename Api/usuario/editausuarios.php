<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datos = json_decode(file_get_contents("php://input"), true);

    if (isset($datos['dni']) && isset($datos['nuevosdatos'])) {

        $dni = $datos['dni'];
        $nuevosDatos = $datos['nuevosDatos'];

        $resultado = repousuarios::editarusuario($dni, $nuevosdatos);

        header('Content-Type: application/json');
        echo json_encode(['success' => $resultado]);

    } else {

        http_response_code(400);
        
    }


}


?>