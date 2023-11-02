<?php
require_once 'gbd.php';
class Login{
    //LUEGO EXTRAER LOS DATOS A TRAVÉS DEL OBJETO USUARIO GRACIAS A LOS GETTERS, DAR LA FUNCIONALIDAD DE LA SESIONES A LA CLASE SESION.PHP
    public static function identifica(string $usuario, string $contrasena, bool $recuerdame)
    {
        if (self::existeusuario($usuario, $contrasena)) {
            // Inicia la sesión si no está iniciada.
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            // Almacena el usuario en la sesión.
            $_SESSION['usuario'] = $usuario;
    
            // Manejo de la cookie.
            // Si se marca "Recuérdame", guarda la cookie.
            if ($recuerdame) {
                self::guardarcookie($usuario);
            }
        }
    }
    
    public static function existeusuario(string $usuario, string $contrasena = null)
    {
        $conexion = GBD::obtenerlaconexion();
        $consulta = "SELECT * FROM USUARIO WHERE NOMBRE = ? AND CONTRASENA = ?";
    
        $sentenciabd = $conexion->prepare($consulta);
        $sentenciabd->bind_param("ss", $usuario, $contrasena);
    
        if ($sentenciabd->execute()) {
            $sentenciabd->store_result();
            return $sentenciabd -> num_rows > 0;
        }
    
        return false;
    }
    
    public static function usuarioestalogueado()
    {
        // Inicia la sesión si no está iniciada.
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Verifica si el usuario está almacenado en la sesión.
        if (isset($_SESSION['usuario'])) {
            return true;
        }
        
        // Verifica si hay una cookie de usuario.
        if (isset($_COOKIE['usuario'])) {
            return true;
        }
    
        return false;
    }

    private static function guardarcookie(string $usuario)
    {
        $tiempoexpirado = time() + 3600; // 1 hora en segundos
        setcookie('usuario', $usuario, $tiempoexpirado, "/");   //Pongo "/" para que recoja bien todas las rutas y que la cookie sea válida en ellas.
    }
}
?>