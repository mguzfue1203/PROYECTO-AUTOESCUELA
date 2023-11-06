<?php
//--MANEJO FORMULARIO-------------------------------
//--REQUIRES-------------------------------
require_once './helper/login.php';
require_once './helper/register.php';
require_once './Clases/usuario.php';
require_once './helper/gbd.php';
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

    //Verificamos si el usuario ya existe
    
    if (Register::estaregistrado($nombre, $contrasena)) {
        $mensajedeerror = "El usuario ya está registrado.";
    } else {
        
        if (Register::registrar($nombre, $dni, $apellido1, $apellido2, $fechanacimiento, $contrasena, $email, '')) {
            
            $mensajedeerror = "Buen registro.";
        } else {
            $mensajedeerror = "Error en el registro.";
        }
    }
}
?>
<div class="login-form">
    <form action="" method="post">
        <h1>Regístrate</h1>
        <div>
            <input type="text" name="nombre" placeholder="Nombre" required="required" class="input-field" id="nombre-input">
        </div>
        <div>
            <input type="text" name="dni" placeholder="DNI" required="required" class="input-field" id="dni-input">
        </div>
        <div>
            <input type="text" name="apellido1" placeholder="Primer Apellido" required="required" class="input-field" id="apellido1-input">
        </div>
        <div>
            <input type="text" name="apellido2" placeholder="Segundo Apellido" required="required" class="input-field" id="apellido2-input">
        </div>
        <div>
            <input type="date" name="fechanacimiento" placeholder="Fecha de Nacimiento" required="required" class="input-field" id="fechanacimiento-input">
        </div>
        <div>
            <input type="password" name="contrasena" placeholder="Contraseña" required="required" class="input-field" id="contrasena-input">
        </div>
        <div>
            <input type="email" name="email" placeholder="Email" required="required" class="input-field" id="email-input">
        </div>
        <div>
            <?php
            if (!empty($mensajedeerror)) {
                echo $mensajedeerror;
            }
            ?>
        </div>
        <div>
            <button type="submit" name="submit" class="submit-button" id="submit-button">Registrar</button>
        </div>
    </form>
    <p><a href="index.php?menu=autentifica">Loguéate</a></p>
</div>