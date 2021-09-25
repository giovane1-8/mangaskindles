<?php
    define("VENDOR_PATH","http://192.168.15.11/Site de Livros Kindle/");
    if(empty($_SESSION['isLogado'])){
        $_SESSION['isLogado'] = false;
    };
    class Application{
        const DEFAULT = "Home";

        public function executar(){

            if(isset($_GET['url'])){
                $url = explode("/",$_GET['url']);
                $class = 'Controllers\\'.ucfirst($url[0])."Controller";
            }else{
                $class = 'Controllers\\'.self::DEFAULT."Controller";
                $url[0] = self::DEFAULT;
            }

            $view = 'Views\\'.ucfirst($url[0])."View";
            $model ='Models\\'.ucfirst($url[0])."Model";        
            $controller = new $class(new $view , new $model);
            $controller -> index();
            
        }
    }