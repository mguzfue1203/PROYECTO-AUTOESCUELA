<?php
//--MANEJO FORMULARIO-------------------------------
//--REQUIRES-------------------------------

//Si el usuario está logueado redirige al index.
if (Login::usuarioestalogueado()) {
    header("Location: ./index.php?menu=inicio");
    exit;
}

//Declaro la variable para manejar el mensaje de error.
$mensajedeerror = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

    //Obtenemos los datos del formulario

    $nombre = $_POST['nombre'];
    $dni = $_POST['dni'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $fechanacimiento = $_POST['fechanacimiento'];
    $contrasena = $_POST['contrasena'];
    $email = $_POST['email'];

    $usuarionuevo = new Usuario($nombre, $dni, $apellido1, $apellido2, $fechanacimiento, $contrasena, $email, 'usuario');//El rol por defecto será usuario tal y como se requiere en el proyecto.
    //Sacamos la información del objeto a través de su solicitud get de cada propiedad, que devuelve el dato.
    $nombreobj = $usuarionuevo -> getnombre();
    $dniobj = $usuarionuevo -> getdni();
    $apellido1obj = $usuarionuevo -> getapellido1();
    $apellido2obj = $usuarionuevo -> getapellido2();
    $fechanacimientoobj = $usuarionuevo -> getfechanacimiento();
    $contrasenaobj = $usuarionuevo -> getcontrasena();
    $emailobj = $usuarionuevo -> getemail();
    $rolobj = $usuarionuevo -> getrol();
    
    //Verificamos si el usuario ya existe
    
    if (Register::estaregistrado($dniobj, $contrasenaobj) !== false) {
        $mensajedeerror = "El usuario ya está registrado.";
    } else {
        
        if (Register::registrar($nombreobj, $dniobj, $apellido1obj, $apellido2obj, $fechanacimientoobj,  $contrasenaobj, $emailobj, $rolobj )) {
            
            $mensajedeerror = "Buen registro.";
        } else {
            $mensajedeerror = "Error en el registro.";
        }
    }
}
?>