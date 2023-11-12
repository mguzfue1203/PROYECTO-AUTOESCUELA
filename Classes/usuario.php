<?php
class usuario {

    private $id;
    private $nombre;
    private $dni;
    private $apellido1;
    private $apellido2;
    private $fechanacimiento;
    private $contrasena;
    private $email;
    private $rol;


//--Constructor-----------------------------------------------------

public function __construct($nombre, $dni, $apellido1, $apellido2, $fechanacimiento, $contrasena, $email, $rol){
    $this -> nombre = $nombre;
    $this -> dni = $dni;
    $this -> apellido1 = $apellido1;
    $this -> apellido2 = $apellido2;
    $this -> fechanacimiento = $fechanacimiento;
    $this -> setcontrasena($contrasena);    //Como la estamos cifrando, paso por aquí la función para aplicarla.
    $this -> email = $email;
    $this -> rol = $rol;

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

    public function setnombre($nombre){
        $this -> nombre = $nombre;
    }
//-------------------------------------------------------

    public function getapellido1(){
        return $this -> apellido1;
    }

    public function setapellido1($apellido1){
        $this -> apellido1 = $apellido1;
    }
//-------------------------------------------------------

    public function getapellido2(){
        return $this -> apellido2;
    }

    public function setapellido2($apellido2){
        $this -> apellido2 = $apellido2;
    }
//-------------------------------------------------------

    public function getdni(){
        return $this -> dni;
    }

    public function setdni($dni){
        $this -> dni = $dni;
    }

//-------------------------------------------------------

    public function getfechanacimiento(){
        return $this -> fechanacimiento;
    }

    public function setfechanacimiento($fechanacimiento){
        $this -> fechanacimiento = $fechanacimiento;
    }

//-------------------------------------------------------

    public function getcontrasena(){
        return $this -> contrasena;
    }

    public function setcontrasena($contrasena){
        $this -> contrasena = md5($contrasena);
    }

//-------------------------------------------------------

    public function getemail(){
        return $this -> email;
    }

    public function setemail($email){
        $this -> email = $email;
    }

//-------------------------------------------------------

    public function getrol(){
        return $this -> rol;
    }

    public function setrol($rol){
        $this -> rol = $rol;
    }

}

//-------------------------------------------------------
?>