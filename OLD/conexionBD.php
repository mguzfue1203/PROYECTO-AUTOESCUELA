<?php

function conexionBD(){
    $direccionbd = "localhost";
    $usuariobd = "root";
    $contrasenabd = "12345";
    $nombrebd = "autoescuela";

    try {

        $pdo = new PDO('mysql:host=' . $direccionbd . ';dbname=' . $nombrebd .';charset=utf8', $usuariobd, $contrasenabd);
        $pdo -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); //Colocamos los atributos del objeto que la base de datos solicitará

        return $pdo; // Devuelve el objeto PDO
        
    } 
    
    catch (PDOException $evento) {

        echo 'Error al conectarse a la base de datos'; //. $evento->getMessage();
        die();

    }
}

?>
