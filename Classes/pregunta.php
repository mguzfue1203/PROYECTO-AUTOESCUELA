<?php
class pregunta {

    private $id;
    private $enunciado;
    private $respuesta;
    private $url;
    private $tipourl;


//--Constructor-----------------------------------------------------

public function __construct($id, $enunciado, $respuesta, $url, $tipourl){
    $this -> id = $id;
    $this -> enunciado = $enunciado;
    $this -> respuesta = $respuesta;
    $this -> url = $url;
    $this -> tipourl = $tipourl;

}

//--Getters Y Setters-----------------------------------------------------

    public function getid(){
        return $this -> id;
    }

    public function setid($id){
        $this -> id = $id;
    }


//-------------------------------------------------------

    public function getenunciado(){
        return $this -> enunciado;
    }

    public function setenunciado($enunciado){
        $this -> enunciado = $enunciado;
    }

//-------------------------------------------------------

public function getrespuesta(){
    return $this -> respuesta;
}

public function setrespuesta($respuesta){
    $this -> respuesta = $respuesta;
}


//-------------------------------------------------------

public function geturl(){
    return $this -> url;
}

public function seturl($url){
    $this -> url = $url;
}



//-------------------------------------------------------

public function gettipourl(){
    return $this -> tipourl;
}

public function settipourl($tipourl){
    $this -> tipourl = $tipourl;
}

}

?>