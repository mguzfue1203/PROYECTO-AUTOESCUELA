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
            
        while ($fila = $sentenciabd->fetch(PDO::FETCH_ASSOC)) {
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