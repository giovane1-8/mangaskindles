<?php
    session_start();
    ob_start();
    $autoload = function ($class){
        if($class != "Models\PDO"){
            if(file_exists($class.".php")){
                include($class.".php");
            }else{
                include('views/paginas/erroPagina.php');
                include('views/paginas/footer/footer.php');
                die();
            }
        }
    };
    #dedffsdf
    spl_autoload_register($autoload);
    $app = new Application();
    $app -> executar();