<div>
    <div>
        <form action='' method='post'>
            <h2>Regístrate</h2>
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
                <button type='submit' name='submit'>Registrarse</button>
            </div>
        </form>
        <p><a href='autentifica.php'>Crear una Cuenta</a></p>





        
    </div>
</div>
