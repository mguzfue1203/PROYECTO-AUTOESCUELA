<?php
//--REQUIRES-------------------------------
require_once 'gbd.php';
require_once 'sesion.php';
require_once './Clases/usuario.php';


class Login {

//--Funciones-----------------------------------------------------

    //Función para identificar al usuario. Uso la función existeusuario para verificar que existe, obtengo el usuario a través de la función que he creado en la clase usuario y almaceno el usuario en la sesión.
    //También añadimos el booleano $recuerdame para almacenar la cookie si se marca la casilla en el formulario.

    public static function identifica($nombre, $contrasena, bool $recuerdame) {
        if (Usuario::existeusuario($nombre, $contrasena)) {
            // Iniciamos la sesión si no está iniciada.
            Sesion::iniciar();
            // Obtener el usuario por nombre y contraseña y almacenarlo en la sesión.
            $usuario = Usuario::obtenerdatosusuario($nombre, $contrasena);
            if ($usuario) {
                Sesion::escribir('usuario', $usuario);
            }

            // Manejo de la cookie.
            // Si se marca "Recuérdame", guarda la cookie.
            if ($recuerdame) {
                self::guardarcookie($nombre);
            }
        }
    }

//-------------------------------------------------------

    //Función para saber si el usuario está logueado o no.

    public static function usuarioestalogueado() {
        Sesion::iniciar();
        // Verificamos si el usuario está almacenado en la sesión.
        if (Sesion::existe('usuario')) {
            return true;
        }

        // Verificamos si hay una cookie de usuario.
        if (isset($_COOKIE['usuario'])) {
            return true;
        }

        return false;
    }

//-------------------------------------------------------

    //Función para guardar la cookie.

    private static function guardarcookie($nombre) {
        $tiempoexpirado = time() + 3600; // 1 hora en segundos
        setcookie('usuario', $nombre, $tiempoexpirado, "/"); // Pongo "/" para que recoja bien todas las rutas y que la cookie sea válida en ellas.
    }

}


?>