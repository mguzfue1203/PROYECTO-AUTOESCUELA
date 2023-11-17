<?php
require_once '../../auto/Autocargador.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $datospreguntas = json_decode(file_get_contents("php://input"), false);   //Aqui ponemos false para que proporcione el objeto

    if (isset($datospreguntas -> dni)) {
        $id = $datospreguntas -> dni;

        $preguntaeliminada = repopreguntas::borrarpregunta($id);

        if ($preguntaeliminada) {

            http_response_code(200);
            echo json_encode(['mensaje' => 'Pregunta borrada correctamente']);
        } else {
            http_response_code(400);
            echo json_encode(['error' => 'Error al borrar la pregunta']);
        }

        }
    }


?>