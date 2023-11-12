<?php

class repousuarios {

//--Funciones-----------------------------------------------------

//Añado un par de funciones, comparten gran parte del código pero la primera verifica únicamente si existe el usuario y devuelve booleano, y la otra obtiene al usuario y devuelve una instancia del mismo.

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

public static function obtenerdatosusuario($dni, $contrasena) {
    $conexion = GBD::obtenerlaconexion();   
    $consulta = "SELECT * FROM USUARIO WHERE DNI = :dni AND CONTRASENA = MD5(:contrasena)";

    $sentenciabd = $conexion -> prepare($consulta);

    $sentenciabd -> bindParam(':dni', $dni, PDO::PARAM_STR);
    $sentenciabd -> bindParam(':contrasena', $contrasena, PDO::PARAM_STR);

    if ($sentenciabd -> execute()) {
        if ($sentenciabd -> rowCount() > 0) {

            $fila = $sentenciabd -> fetch(PDO::FETCH_ASSOC);
            
            
            $usuario = new Usuario( //Decodifico el JSON en un objeto Usuario, no lo hago con json decode ya que me estaba generando problemas.
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

public static function obtenertodosusuarios() {
    $conexion = GBD::obtenerlaconexion();   
    $consulta = "SELECT * FROM USUARIO";

    $sentenciabd = $conexion -> prepare($consulta);

    if ($sentenciabd -> execute()) {
        $usuarios = array();
            
        while ($fila = $sentenciabd -> fetch(PDO::FETCH_ASSOC)) {
            $usuario = new Usuario( //Decodifico el JSON en un objeto Usuario, no lo hago con json decode ya que me estaba generando problemas.
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

















    
}












?>