<?php
Class Register {
//--Funciones-----------------------------------------------------

//-------------------------------------------------------
//Registro un usuario a través del repositorio de funciones de usuarios.
    public static function registrar($nombre, $dni, $apellido1, $apellido2, $fechanacimiento, $contrasena, $email, $rol){

        if (repousuarios::guardarusuario($nombre, $dni, $apellido1, $apellido2, $fechanacimiento, $contrasena, $email, $rol)) {

            return true; 

        } else {

            return false; 
            
        }

    }

//-------------------------------------------------------

//Compruebo si el usuario ya está registrado a través del repositorio.
public static function estaregistrado($dni, $contrasena) {
    
    return repousuarios::existeusuario($dni, $contrasena);
}

}

?>