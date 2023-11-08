

<!--BODY-->
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