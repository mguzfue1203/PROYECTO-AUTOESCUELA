<?php


class usuario {

    private $id;
    private $nombre;
    private $dni;
    private $apellidos;
    private $fechanacimiento;
    private $contrasena;
    private $email;
    private $rol;



public function __construct($nombre, $dni, $apellidos, $fechanacimiento, $contrasena, $email, $rol){
    $this -> nombre = $nombre;
    $this -> dni = $dni;
    $this -> apellidos = $apellidos;
    $this -> fechanacimiento = $fechanacimiento;
    $this -> contrasena = $contrasena;
    $this -> email = $email;
    $this -> rol = $rol;

}

//-------------------------------------------------------

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

    public function getdni(){
        return $this -> dni;
    }

    public function setdni($dni){
        $this -> dni = $dni;
    }
//-------------------------------------------------------

    public function getapellidos(){
        return $this -> apellidos;
    }

    public function setapellidos($apellidos){
        $this -> apellidos = $apellidos;
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
        $this -> id = $email;
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