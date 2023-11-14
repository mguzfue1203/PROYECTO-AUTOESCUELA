<?php

class repousuarios {

//--Funciones-----------------------------------------------------

//Verifico si existe el usuario por dni y contraseña.
public static function existeusuario($dni, $contrasena) {
    $conexion = GBD::obtenerlaconexion(); // Obtenemos la conexión a la base de datos a través de la clase GBD.
    $consulta = "SELECT * FROM USUARIO WHERE DNI = :dni AND CONTRASENA = MD5(:contrasena)";

    $sentenciabd = $conexion -> prepare($consulta); //Preparo una sentencia donde utilizamos la conexion y la consulta.

    $sentenciabd -> bindParam(':dni', $dni, PDO::PARAM_STR);    //Enlazamos los valores que recibimos a la consulta de la base de datos.
    $sentenciabd -> bindParam(':contrasena', $contrasena, PDO::PARAM_STR);

    if ($sentenciabd -> execute()) {    
        
        return $sentenciabd -> rowCount() > 0; //Ejecutamos la sentencia, si el número de campos es mayor a 0, ha encontrado usuario, devolvemos true, si no.
    }
    
    return false; //Si la consulta no funciona, devolvemos false.
}


//-------------------------------------------------------

//Obtendo los datos del usuario por dni y contraseña.
public static function obtenerdatosusuario($dni, $contrasena) {
    $conexion = GBD::obtenerlaconexion();   
    $consulta = "SELECT * FROM USUARIO WHERE DNI = :dni AND CONTRASENA = MD5(:contrasena)";

    $sentenciabd = $conexion -> prepare($consulta);

    $sentenciabd -> bindParam(':dni', $dni, PDO::PARAM_STR);
    $sentenciabd -> bindParam(':contrasena', $contrasena, PDO::PARAM_STR);

    if ($sentenciabd -> execute()) {
        if ($sentenciabd -> rowCount() > 0) {

            $fila = $sentenciabd -> fetch(PDO::FETCH_ASSOC);
            
            
            $usuario = new usuario( //Decodifico el JSON en un objeto Usuario, no lo hago con json decode ya que me estaba generando problemas.
                $fila['NOMBRE'],
                $fila['DNI'],
                $fila['APELLIDO1'],
                $fila['APELLIDO2'],
                $fila['FECHANACIMIENTO'],
                $fila['CONTRASENA'],
                $fila['EMAIL'],
                $fila['ROL']
            );

            return $usuario;
        }
    }
    
}


//-------------------------------------------------------

//Obtengo todos los usuarios
public static function obtenertodosusuarios() {
    $conexion = GBD::obtenerlaconexion();   
    $consulta = "SELECT * FROM USUARIO";

    $sentenciabd = $conexion -> prepare($consulta);

    if ($sentenciabd -> execute()) {
        $usuarios = array();
            
        while ($fila = $sentenciabd -> fetch(PDO::FETCH_ASSOC)) {
            $usuario = new usuario( //Decodifico el JSON en un objeto Usuario, no lo hago con json decode ya que me estaba generando problemas.
                $fila['NOMBRE'],
                $fila['DNI'],
                $fila['APELLIDO1'],
                $fila['APELLIDO2'],
                $fila['FECHANACIMIENTO'],
                $fila['CONTRASENA'],
                $fila['EMAIL'],
                $fila['ROL']
            );
            $usuarios[] = $usuario;

        } 
        return $usuarios;
    }
    return null;
    
}

//-------------------------------------------------------

//Borro el usuario por dni
public static function borrarusuario($dni) {
    $conexion = GBD::obtenerlaconexion();   
    $consulta = "DELETE FROM USUARIO WHERE DNI = :dni";

    $sentenciabd = $conexion->prepare($consulta);
    $sentenciabd->bindParam(':dni', $dni, PDO::PARAM_STR);

    if ($sentenciabd->execute()) {
        return true; 
    }
    return false;
}


//-------------------------------------------------------
//Guardo el usuario junto a todas sus propiedades.
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



//-----------------------------------------------------



}





?>