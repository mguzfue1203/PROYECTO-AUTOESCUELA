<?php

class repoexamen {

//--Funciones-----------------------------------------------------

public static function obternerexamenes(){

        $conexion = GBD::obtenerlaconexion();   
        $consulta = "SELECT * FROM EXAMEN";
    
        $sentenciabd = $conexion -> prepare($consulta);
    
        if ($sentenciabd -> execute()) {
            $examenes = array();
                
            while ($fila = $sentenciabd -> fetch(PDO::FETCH_ASSOC)) {
                $examen = new examen(
                    $fila['FECHA'],

                );
                $examenes[] = $examen;
    
            } 
            return $examenes;
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