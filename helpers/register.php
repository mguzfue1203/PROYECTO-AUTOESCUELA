<?php
Class Register {
    //--Funciones-----------------------------------------------------

//-------------------------------------------------------
    public static function registrar($nombre, $dni, $apellido1, $apellido2, $fechanacimiento, $contrasena, $email, $rol){

        if (repousuarios::guardarusuario($nombre, $dni, $apellido1, $apellido2, $fechanacimiento, $contrasena, $email, $rol)) {

            return true; 

        } else {

            return false; 
            
        }

    }

//-------------------------------------------------------

public static function estaregistrado($dni, $contrasena) {
    
    return repousuarios::existeusuario($dni, $contrasena);
}

}

?>