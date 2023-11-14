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

        $usuarioactual = Login::usuarioestalogueado();
        
        if ($usuarioactual) {
            $rolusuario = Login::rolusuariolog();
            if ($rolusuario  === "administrador") {
                require_once 'adminheader.php';

            } elseif ($rolusuario  === "profesor") {
                require_once 'profesorheader.php';

            } elseif ($rolusuario === "usuario") {

                require_once 'userheader.php';

            } else {

                require_once 'invitadoheader.php'; 

            }
        } else {
            require_once 'invitadoheader.php';

        }

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