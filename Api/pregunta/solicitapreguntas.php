<?php
require_once '../../auto/Autocargador.php';
if ($_SERVER['REQUEST_METHOD']=='GET'){

$preguntas = repopreguntas::obternerpreguntas();

$arraypreguntas = [];

foreach ($preguntas as $pregunta) {

    $datoscadapregunta = [
        'id' => $pregunta -> getid(),
        'enunciado' => $pregunta -> getenunciado(),
        'respuesta' => $pregunta -> getrespuesta(),
        'url' => $pregunta -> geturl(),
        'tipourl' => $pregunta -> gettipourl()


    ];

    $arraypreguntas[] = $datoscadapregunta;
}

header('Content-Type: application/json');
echo json_encode($arraypreguntas);
} else {


    http_response_code(400);
    echo json_encode(['error' => 'Error al solicitar las preguntas']);
}
?>