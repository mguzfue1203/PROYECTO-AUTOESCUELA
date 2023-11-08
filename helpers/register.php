<?php
//--REQUIRES-------------------------------
require_once 'gbd.php';
//require_once './Clases/usuario.php';

Class Register {
    //--Funciones-----------------------------------------------------

//-------------------------------------------------------
    public static function registrar($nombre, $dni, $apellido1, $apellido2, $fechanacimiento, $contrasena, $email, $rol){

        if (self::guardarusuario($nombre, $dni, $apellido1, $apellido2, $fechanacimiento, $contrasena, $email, $rol)) {

            return true; 

        } else {

            return false; 
            
        }

    }

//-------------------------------------------------------

public static function guardarusuario($nombre, $dni, $apellido1, $apellido2, $fechanacimiento, $contrasena, $email, $rol){

    $conexion = GBD::obtenerlaconexion();
    $consulta = "INSERT INTO USUARIO (NOMBRE, DNI, APELLIDO1, APELLIDO2, FECHANACIMIENTO, CONTRASENA, EMAIL, ROL) VALUES (:nombre, :dni, :apellido1, :apellido2, :fechanacimiento, :contrasena, :email, :rol)";

    $sentenciabd = $conexion -> prepare($consulta);

    $sentenciabd -> bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $sentenciabd -> bindParam(':dni', $dni, PDO::PARAM_STR);
    $sentenciabd -> bindParam(':apellido1', $apellido1, PDO::PARAM_STR);
    $sentenciabd -> bindParam(':apellido2', $apellido2, PDO::PARAM_STR);
    $sentenciabd -> bindParam(':fechanacimiento', $fechanacimiento, PDO::PARAM_STR);
    $sentenciabd -> bindParam(':contrasena', $contrasena, PDO::PARAM_STR);
    $sentenciabd -> bindParam(':email', $email, PDO::PARAM_STR);
    $sentenciabd -> bindParam(':rol', $rol, PDO::PARAM_STR);

    return $sentenciabd -> execute();
}

//-------------------------------------------------------

public static function estaregistrado($dni, $contrasena) {
    
    return Usuario::existeusuario($dni, $contrasena);
}

}

?>