<?php
class GBD
{
    private static $conexion;
    
    public static function obtenerlaconexion()
    {
        // Miramos si ya tenemos una conexión establecida
        if (self::$conexion === null) {
            // Configuramos la conexión
            $servidorbd = 'localhost:3305';
            $usuariobd = 'root';
            $contrasenabd = '12345';
            $nombrebd = 'autoescuela';

            self::$conexion = new mysqli($servidorbd, $usuariobd, $contrasenabd, $nombrebd);

            if (self::$conexion -> connect_error) {
                die("Hay un error en la conexión con la base de datos, revisa tu configuración: " . self::$conexion -> connect_error);
            }
        }

        return self::$conexion;
    }
}
