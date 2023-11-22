
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

$validador = new Validacion();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

    $validador -> Requerido('nombre');
    $validador -> Requerido('dni');
    $validador -> Dni('dni');
    $validador -> Requerido('apellido1');
    $validador -> Requerido('apellido2');
    $validador -> Requerido('fechanacimiento');
    $validador -> Requerido('contrasena');
    $validador -> Requerido('email');


    if ($validador -> ValidacionPasada()){
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
            
            $mensajedeerror = "Registrado correctamente.";
        } else {
            $mensajedeerror = "Error en el registro.";
        }
    }
}
}
?>
<!--BODY-->
<div class="bodyregister">
<div class="loginregister-form">
    <form action="" method="post"  novalidate>
        <h1>Regístrate</h1>
        <div>
            <input type="text" name="nombre" placeholder="Nombre" value="<?php echo $validador -> getValor('nombre'); ?>" class="input-field" id="nombre-input">
            <?php echo $validador -> ImprimirError('nombre'); ?>
        </div>
        <div>
            <input type="text" name="dni" placeholder="DNI" value="<?php echo $validador -> getValor('dni'); ?>" class="input-field" id="dni-input">
            <?php echo $validador->ImprimirError('dni'); ?>
        </div>
        <div>
            <input type="text" name="apellido1" placeholder="Primer Apellido" value="<?php echo $validador -> getValor('apellido1'); ?>" class="input-field" id="apellido1-input">
            <?php echo $validador -> ImprimirError('apellido1'); ?>
        </div>
        <div>
            <input type="text" name="apellido2" placeholder="Segundo Apellido" value="<?php echo $validador -> getValor('apellido2'); ?>" class="input-field" id="apellido2-input">
            <?php echo $validador -> ImprimirError('apellido2'); ?>
        </div>
        <div>
            <input type="date" name="fechanacimiento" placeholder="Fecha de Nacimiento" value="<?php echo $validador -> getValor('fechanacimiento'); ?>" class="input-field" id="fechanacimiento-input">
            <?php echo $validador -> ImprimirError('fechanacimiento'); ?>
        </div>
        <div>
            <input type="password" name="contrasena" placeholder="Contraseña" value="<?php echo $validador -> getValor('contrasena'); ?>" class="input-field" id="contrasena-input">
            <?php echo $validador -> ImprimirError('contrasena'); ?>
        </div>
        <div>
            <input type="email" name="email" placeholder="Email" value="<?php echo $validador -> getValor('email'); ?>" class="input-field" id="email-input">
            <?php echo $validador -> ImprimirError('email'); ?>
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
    <p class="sub-submit"><a href="index.php?menu=autentifica">Loguéate</a></p>
</div>
</div>