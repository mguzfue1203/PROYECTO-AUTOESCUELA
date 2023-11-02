<?php
class Sesion
{
    public static function iniciar()
    {
        //Iniciamos la sesión en caso de que no la tengamos iniciada.
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
    }

    public static function leer(string $clave)
    {
        
    }

    public static function existe(string $clave)
    {
        
    }

    public static function escribir($clave,$valor)
    {
        
    }

    public static function eliminar($clave)
    {
        
    }
}