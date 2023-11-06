<?php
class Principal
{
    public static function main()
    {
        //require_once ('./cargadores/Autocargador.php');
        //Autocargador::autocargar();
        require_once './Vistas/Principal/layout.php';
    }
}
Principal::main();
?>
