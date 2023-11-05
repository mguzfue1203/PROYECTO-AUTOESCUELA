<?php
//--MANEJO FORMULARIO-------------------------------
//--REQUIRES-------------------------------
require_once './helper/login.php';
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
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];
        // Realizamos la verificación de los campos introducidos en la base de datos
        if (usuario::existeusuario($usuario, $contrasena)) {
            $recuerdame = isset($_POST['recuerdame']);
            Login::identifica($usuario, $contrasena, $recuerdame);
            header('Location: ./index.php?menu=tests');
            
            exit;
        } else {
            $mensajedeerror = 'Usuario o contraseña incorrectos, revisa los campos y vuelve a intentarlo.';
        }
    }
}
?>

<!--BODY-->
<div>
    <div>
        <form action='' method='post'>
            <h2>Identifícate</h2>
            <div>
                <input type='text' name='usuario' placeholder='Usuario' required='required'>
            </div>
            <div>
                <input type='password' name='contrasena' placeholder='Contraseña' required='required'>
            </div>
            <div>
                <?php
                //Aquí aparecerá el mensaje de error.
                if (!empty($mensajedeerror)) {
                    echo $mensajedeerror;
                }
                ?>
            </div>
            <div>
                <button type='submit' name='submit'>Iniciar sesión</button>
            </div>
            <div>
                <label>
                    <input type='checkbox' name='recuerdame'>Recuérdame</label>
            </div>
        </form>
        <p><a href='index.php?menu=registra'>Crear una Cuenta</a></p>

    </div>
</div>
