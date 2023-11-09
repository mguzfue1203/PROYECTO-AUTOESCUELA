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

<!--BODY-->
<div class="bodylogin">
    <div>
        <form action='' method='post' class="loginregister-form">
            <h2>Identifícate</h2>
            <div>
                <input type='text' name='dni' id='dni' placeholder='DNI' required='required' class="input-field">
            </div>
            <div>
                <input type='password' name='contrasena' id='contrasena' placeholder='Contraseña' required='required' class="input-field">
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
                <button type='submit' name='submit' class="submit-button">Iniciar sesión</button>
            </div>
            <div>
            <span class="checkbox"></span>
                    <input type='checkbox' name='recuerdame' id='cookie' class="checkbox"><label for="recuerdame" class="checkbox">Recuérdame</label>
                    <p class="sub-submit">¿No tienes cuenta? <a href='index.php?menu=registra'>Crea una.</a></p>
            </div>
        </form>
        
    </div>
</div>