<?php

    namespace Controllers;
    class HomeController extends Controller{
        public function __construct($view, $model){
            parent::__construct($view,$model);
        }

        public function index(){
            





            
            //render("NOME DO ARQUIVOU DO CORPO", 'TITULO DA PAGINA', 'CABEÇA DA PAGINA , FOOTER DA PAGINA')
            

            \Router::rota("home/procurarManga", function () {
                if(!empty($_POST)){
                    $request = $_POST["manga"];
                    $dados = $this -> model -> procurarManga($request);
                    echo $dados;
                }else{
                    header("location: ".VENDOR_PATH);
                }
            });
            $this->view->render("home", 'Home',$this->generos);
        }
    }
    