<?php


$body = file_get_contents("php://input");
//echo $body;
/*$_PUT = array();
parse_str($body,$_PUT);


    echo 'Este es tu id: ' . $_PUT['id'] . ' // ';
    echo  'Este es tu nombre: ' . $_PUT['nombre'];
    */
echo "<img src='$body'>";


?>