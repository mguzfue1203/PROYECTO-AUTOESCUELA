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

//--Funciones-----------------------------------------------------

//Aunque no es lo más adecuado, he añadido la lógica del usuario en la propia clase usuario.
//Añado un par de funciones, comparten gran parte del código pero la primera verifica únicamente si existe el usuario y devuelve booleano, y la otra obtiene al usuario y devuelve una instancia del mismo.

public static function existeusuario($nombre, $contrasena) {
    $conexion = GBD::obtenerlaconexion();   //Establezco la conexión con la base de datos a través de la clase gbd.
    $consulta = "SELECT * FROM USUARIO WHERE NOMBRE = ? AND CONTRASENA = ?";    //Almaceno la consulta a la base de datos en la variable consulta para usarla en la sentencia.

    $sentenciabd = $conexion -> prepare($consulta); //Preparo una sentencia donde utilizamos la conexion y la consulta.
    $sentenciabd -> bind_param("ss", $nombre, $contrasena); //Enlazamos los valores que recibimos a la consulta de la base de datos por orden, cada s representa un valor de tipo cadena.

    if ($sentenciabd -> execute()) {    //Ejecutamos la sentencia, y almacenamos el resultado en memorial local, si el número de campos devueltos es mayor a 0, se ha encontrado el usuario.
        $sentenciabd -> store_result();
        return $sentenciabd -> num_rows > 0;
    }

    return false;
}

//-------------------------------------------------------

public static function obtenerdatosusuario($nombre, $contrasena) {

    $conexion = GBD::obtenerlaconexion();   //Establezco la conexión con la base de datos a través de la clase gbd.
    $consulta = "SELECT * FROM USUARIO WHERE NOMBRE = ? AND CONTRASENA = ?";    //Almaceno la consulta a la base de datos en la variable consulta para usarla en la sentencia.

    $sentenciabd = $conexion->prepare($consulta);   //Preparo una sentencia donde utilizamos la conexion y la consulta.
    $sentenciabd->bind_param("ss", $nombre, $contrasena);   //Enlazamos los valores que recibimos a la consulta de la base de datos por orden, cada s representa un valor de tipo cadena.

    if ($sentenciabd->execute()) {  //Ejecutamos la sentencia, y recogemos el resultado de la memorial local, si el número de campos devueltos es mayor a 0, extraemos los datos de la primera fila, y creamos una instancia de la clase usuario con esos datos.
        $resultado = $sentenciabd->get_result();
        if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();
            return new Usuario($fila['NOMBRE'], $fila['DNI'], $fila['APELLIDO1'], $fila['APELLIDO2'], $fila['FECHANACIMIENTO'], $fila['CONTRASENA'], $fila['EMAIL'], $fila['ROL']);
        }
    }

    return null;    //Si no, no devuelve nada.
}
//-------------------------------------------------------


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
/*public function guardar() {

    $conexion = GBD::obtenerlaconexion();
    $consulta = "INSERT INTO USUARIO (NOMBRE, DNI, APELLIDO1, APELLIDO2, FECHANACIMIENTO, CONTRASENA, EMAIL, ROL) VALUES (?, ?, ?, ?, ?, ?, ?, usuario)";//Le doy valor predeterminado a el rol como usuario, tal y como se solicita en el documento.
    
    $sentenciabd = $conexion->prepare($consulta);
    $sentenciabd->bind_param("ssssssss", $this->nombre, $this->dni, $this->apellido1, $this->apellido2, $this->fechanacimiento, $this->contrasena, $this->email, $this->rol);

    return $sentenciabd->execute();
}
}*/
?>