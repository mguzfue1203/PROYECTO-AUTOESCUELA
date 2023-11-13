<?php
require_once '../auto/Autocargador.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datosusuario = json_decode(file_get_contents("php://input"));

    if (isset($datosusuario -> dni)) {
        $dni = $datosusuario -> dni;

        $usuarioeliminado = repousuarios::borrarusuario($dni);

        if ($usuarioeliminado) {

            http_response_code(200);

        }
    }
}
?>