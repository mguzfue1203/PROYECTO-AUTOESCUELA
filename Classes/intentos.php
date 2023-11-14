<?php
class intentos {

    private $id;
    private $fecha;



//--Constructor-----------------------------------------------------

public function __construct($fecha){
    $this -> fecha = $fecha;

}

//--Getters Y Setters-----------------------------------------------------

    public function getid(){
        return $this -> id;
    }

    public function setid($id){
        $this -> id = $id;
    }


//-------------------------------------------------------

    public function getfecha(){
        return $this -> fecha;
    }

    public function setfecha($fecha){
        $this -> fecha = $fecha;
    }
}
?>