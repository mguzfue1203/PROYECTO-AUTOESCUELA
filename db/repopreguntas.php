<?php

class repopreguntas {

//--Funciones-----------------------------------------------------
public static function obternerpreguntas(){

    $conexion = GBD::obtenerlaconexion();   
    $consulta = "SELECT * FROM PREGUNTA";

    $sentenciabd = $conexion -> prepare($consulta);

    if ($sentenciabd -> execute()) {
        $preguntas = array();
            
        while ($fila = $sentenciabd -> fetch(PDO::FETCH_ASSOC)) {
            $pregunta = new pregunta(
                $fila['idPREGUNTA'],
                $fila['ENUNCIADO'],
                $fila['RESPUESTA'],
                $fila['URL'],
                $fila['tipoURL']


            );
            
            $preguntas[] = $pregunta;

        } 
        return $preguntas;
    }
    return null;
    



}



//-------------------------------------------------------
public static function borrarpregunta($id) {
    $conexion = GBD::obtenerlaconexion();   
    $consulta = "DELETE FROM PREGUNTA WHERE id = :id";

    $sentenciabd = $conexion->prepare($consulta);
    $sentenciabd->bindParam(':id', $id, PDO::PARAM_STR);

    if ($sentenciabd->execute()) {
        return true; 
    }
    return false;
}


//-------------------------------------------------------



//-------------------------------------------------------




//-------------------------------------------------------




//-----------------------------------------------------

}





?>