<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AUTOESCUELA</title>
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="JS/paneladmin.js"></script>
</head>
<body>
    <?php
        /*$usuarioactual = Login::();

        if ($usuarioactual) {
            echo "Usuario encontrado. Rol: " . $usuarioactual -> getrol(); // Obtener el rol utilizando el método del objeto
            if ($usuarioactual -> getrol() === "administrador") {
                require_once 'adminheader.php';
                echo "Mostrando header de administrador";
            } elseif ($usuarioactual -> getrol() === "profesor") {
                require_once 'profesorheader.php';
                echo "Mostrando header de profesor";
            } elseif ($usuarioactual -> getrol() === "usuario") {
                require_once 'userheader.php';
                echo "Mostrando header de usuario";
            } else {
                require_once 'userheader.php'; // Opción por defecto
                echo "Mostrando header por defecto";
            }
        } else {
            require_once 'userheader.php';
            echo "No se encontró ningún usuario";
        }*/
        require_once 'invitadoheader.php';
        ?>
    <section>
        <div>
        <?php
        
        require_once 'enruta.php';
        ?>
        </div>
    </section>

    <?php
        require_once 'footer.php';
    ?>

</body>

</html>