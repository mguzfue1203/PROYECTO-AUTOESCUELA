<?php

class Sesion{
    
    public static function iniciar(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function leer($clave){
        return isset($_SESSION[$clave])?$_SESSION[$clave]:"";
    }

    public static function existe($clave){
        return isset($_SESSION[$clave])?true:false;
    }

    public static function escribir($clave,$valor){
        $_SESSION[$clave]=$valor;
    }

    public static function eliminar($clave){
        unset($_SESSION[$clave]);
    }

    public static function destruir(){
        session_destroy();
    }
}
?>