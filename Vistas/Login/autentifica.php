<?php
require_once '../../helper/login.php';
$mensajedeerror = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];
        // Realiza la verificación de las credenciales en la base de datos
        if (Login::existeusuario($usuario, $contrasena)) {
            $recuerdame = isset($_POST['recuerdame']);
            Login::identifica($usuario, $contrasena, $recuerdame);
            
            header('Location: ../Principal/layout.php');
            exit;
        } else {
            $mensajedeerror = 'Usuario o contraseña incorrectos, revisa los campos y vuelve a intentarlo.';
        }
    }
}
?>
<div>
    <div>
        <form action='' method='post'>
            <h2>Identifícate</h2>
            <div>
                <input type='text' name='usuario' placeholder='Usuario' required='required'>
            </div>
            <div>
                <input type='password' name='contrasena' placeholder='Contraseña'
                    required='required'>
            </div>
            <div>
                <?php
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
        <p><a href='registra.php'>Crear una Cuenta</a></p>

    </div>
</div>
