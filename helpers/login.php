<?php
class Login {

//--Funciones-----------------------------------------------------

    //Función para identificar al usuario. Uso la función existeusuario para verificar que existe, obtengo el usuario a través de la función que he creado en la clase usuario y almaceno el usuario en la sesión.
    //También añadimos el booleano $recuerdame para almacenar la cookie si se marca la casilla en el formulario.

    public static function identifica(usuario $usuario, bool $recuerdame) {

            //Inicio la sesión si no está iniciada.
            Sesion::iniciar();
            
            Sesion::escribir('usuario', $usuario);

            // Manejo de la cookie.
            // Si se marca "Recuérdame", guarda la cookie.
            if ($recuerdame) {

                self::guardarcookie($usuario);

            }
    }

//-------------------------------------------------------

    //Función para saber si el usuario está logueado o no.

    public static function usuarioestalogueado() {
        //Inicio la sesión si no está iniciada.
        Sesion::iniciar();

        //VerificO si el usuario está almacenado en la sesión.
        if (Sesion::existe('usuario')) {

            return true;

        }

        //VerificO si hay una cookie de usuario.
        if (isset($_COOKIE['dni'])) {

            return true;

        }

        return false;
    }
//-------------------------------------------------------


    public static function rolusuariolog(){
    
        Sesion::iniciar();


        if (Sesion::existe('usuario')) {


            $usuariolog = Sesion::leer('usuario');


            $rolusuariolog = $usuariolog->getrol();


            return $rolusuariolog;
    } else {

        return null;

    }

}


public static function nombreusuariolog(){
    
    Sesion::iniciar();


    if (Sesion::existe('usuario')) {


        $usuariolog = Sesion::leer('usuario');


        $nombreusuariolog = $usuariolog->getnombre();


        return $nombreusuariolog;
} else {

    return null;

}

}





    //Función para guardar la cookie.

    private static function guardarcookie(usuario $usuario) {
        $tiempoexpirado = time() + 3600; // 1 hora en segundos
        setcookie('dni',  $usuario->getdni(), $tiempoexpirado, "/"); // Pongo "/" para que recoja bien todas las rutas y que la cookie sea válida en ellas.
    }

}


?>