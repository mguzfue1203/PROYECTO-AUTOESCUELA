<?php
    require_once '../Class/usuario.php';
    require_once '../Repository/conexionBD.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];


    $conexion = conexionBD();

    //Verificamos que las credenciales son correctas a través de servidor
    $consulta = 'SELECT * FROM USUARIO WHERE NOMBRE = :usuario AND CONTRASENA = :contrasena';
    $sentenciabd = $conexion -> prepare($consulta);
    $sentenciabd -> bindParam(":usuario", $usuario);
    $sentenciabd -> bindParam(":contrasena", $contrasena);
    $sentenciabd -> execute();
    $resultado = $sentenciabd -> fetch();

    if ($resultado) {
        
        echo json_encode(['status' => 'success']);
    } 
    else {
        
        echo json_encode(['status' => 'error']);
    }
}
    





?>