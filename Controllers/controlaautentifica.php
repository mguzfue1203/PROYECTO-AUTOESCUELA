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

//Si efectivamente el método es post, y hacemos submit, verifica que el usuario y contraseña coincidan con el registrado en la bd a través de la función de la clase usuario, si es así loguea y entra a la página de tests. Si no muestra un mensaje de error.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {
        $dni = $_POST['dni'];
        $contrasena = $_POST['contrasena'];
        // Realizamos la verificación de los campos introducidos en la base de datos
        if (usuario::existeusuario($dni, $contrasena)) {
            $recuerdame = isset($_POST['recuerdame']);
            Login::identifica($dni, $contrasena, $recuerdame);
            header('Location: ./index.php?menu=tests');
            
            exit;
        } else {
            $mensajedeerror = 'DNI o contraseña incorrectos, revisa los campos y vuelve a intentarlo.';
        }
    }
}
?>