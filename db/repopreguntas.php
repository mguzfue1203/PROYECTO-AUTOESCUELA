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



//-------------------------------------------------------



//-------------------------------------------------------




//-------------------------------------------------------




//-----------------------------------------------------

}





?>