<?php
class dificultad {

    private $id;
    private $nombre;



//--Constructor-----------------------------------------------------

public function __construct($nombre){
    $this -> nombre = $nombre;

}


//--Getters Y Setters-----------------------------------------------------

    public function getid(){
        return $this -> id;
    }

    public function setid($id){
        $this -> id = $id;
    }
    
//-------------------------------------------------------

    public function getnombre(){
        return $this -> nombre;
    }

    public function setfecha($nombre){
        $this -> nombre = $nombre;
    }
}
?>