<?php
    define("VENDOR_PATH","http://200.232.188.144/Site%20de%20Livros%20Kindle%20%200.0.2/");
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
                $class = "Controllers\\HomeController";
                $url[0] = self::DEFAULT;
            }

            $view = 'Views\\'.ucfirst($url[0])."View";
            $model ='Models\\'.ucfirst($url[0])."Model";        
            $controller = new $class(new $view , new $model);
            $controller -> index();
            
        }
    }