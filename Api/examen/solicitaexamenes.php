<?php
require_once '../../auto/Autocargador.php';
if ($_SERVER['REQUEST_METHOD']=='GET'){

$examenes = repoexamen::obternerexamenes();

$arrayexamenes = [];

foreach ($examenes as $examen) {

    $datoscadaexamen = [
        'fecha' => $examen -> getfecha(),


    ];

    $arrayexamenes[] = $datoscadaexamen;
}

header('Content-Type: application/json');
echo json_encode($arrayexamenes);
} else {


    http_response_code(400);
    echo json_encode(['error' => 'Error al solicitar los examenes']);
}
?>