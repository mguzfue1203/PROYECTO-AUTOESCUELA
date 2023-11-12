<?php

function autocarga($clase){

    if (file_exists($_SERVER["DOCUMENT_ROOT"].'/Classes/'.$clase.'.php')){

        include $_SERVER["DOCUMENT_ROOT"].'/Classes/'.$clase.'.php';

    }
    
    else if(file_exists($_SERVER["DOCUMENT_ROOT"].'/helpers/'.$clase.'.php')){

        include $_SERVER["DOCUMENT_ROOT"].'/helpers/'.$clase.'.php';

    }

    else if(file_exists($_SERVER["DOCUMENT_ROOT"].'/Controllers/'.$clase.'.php')){

        include $_SERVER["DOCUMENT_ROOT"].'/Controllers/'.$clase.'.php';
        

    }
    else if(file_exists($_SERVER["DOCUMENT_ROOT"].'/db/'.$clase.'.php')){

        include $_SERVER["DOCUMENT_ROOT"].'/db/'.$clase.'.php';
        

    }
    
    else if(file_exists($_SERVER["DOCUMENT_ROOT"].'/Views/'.$clase.'.php')){

        include $_SERVER["DOCUMENT_ROOT"].'/Views/'.$clase.'.php';
    }
}
spl_autoload_register("autocarga");

?>