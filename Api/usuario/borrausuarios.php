<?php
require_once '../../auto/Autocargador.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $datosusuario = json_decode(file_get_contents("php://input"), false);   //Aqui ponemos false para que proporcione el objeto

    if (isset($datosusuario -> dni)) {
        $dni = $datosusuario -> dni;

        $usuarioeliminado = repousuarios::borrarusuario($dni);

        if ($usuarioeliminado) {

            http_response_code(200);
            echo json_encode(['mensaje' => 'Usuario borrado correctamente']);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Error al borrar el usuario']);
        }

        }
    }


?>