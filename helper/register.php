<?php
//--REQUIRES-------------------------------
require_once 'gbd.php';
require_once './Clases/usuario.php';

Class Register {
    //--Funciones-----------------------------------------------------

//-------------------------------------------------------
    public static function registrar($nombre, $dni, $apellido1, $apellido2, $fechanacimiento, $contrasena, $email){
        
        $usuarionuevo = new Usuario($nombre, $dni, $apellido1, $apellido2, $fechanacimiento, $contrasena, $email, 'usuario');//El rol por defecto será usuario tal y como se requiere en el proyecto.

        if (self::guardarusuario($usuarionuevo)) {
            return true; 
        } else {
            return false; 
        }

    }

//-------------------------------------------------------

    public static function guardarusuario($usuarionuevo){
        

        $conexion = GBD::obtenerlaconexion();
        $consulta = "INSERT INTO USUARIO (NOMBRE, DNI, APELLIDO1, APELLIDO2, FECHANACIMIENTO, CONTRASENA, EMAIL, ROL) VALUES (?, ?, ?, ?, ?, ?, ?, ?)"; 

        $sentenciabd = $conexion->prepare($consulta);

        
        $sentenciabd -> bind_param("ssssssss", $usuarionuevo -> getnombre(), $usuarionuevo -> getdni(), $usuarionuevo -> getapellido1(), $usuarionuevo -> getapellido2(), $usuarionuevo -> getfechanacimiento(), $usuarionuevo -> getcontrasena(), $usuarionuevo -> getemail(), $usuarionuevo -> getrol());

        return $sentenciabd -> execute();
    }

//-------------------------------------------------------

public static function estaregistrado($nombre, $contrasena) {
    
    return Usuario::existeusuario($nombre, $contrasena);
}

}

?>