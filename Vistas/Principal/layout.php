<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AUTOESCUELA</title>
    <link rel="stylesheet" href="./css/styles.css">
    </script>
</head>

<body>
    <?php
        require_once './Vistas/Principal/header.php';
    ?>
    <section>
        <div id="cuerpo">
        <?php
           require_once './Vistas/Principal/enruta.php';
        ?>
        </div>
    </section>

    <?php
        require_once './Vistas/Principal/footer.php';
    ?>

</body>

</html>