<?php

    namespace Controllers;
    class HomeController extends Controller{
        public function __construct($view, $model){
            parent::__construct($view,$model);
        }

        public function index(){
            





            
            //render("NOME DO ARQUIVOU DO CORPO", 'TITULO DA PAGINA', 'CABEÇA DA PAGINA , FOOTER DA PAGINA')
            


            $this->view->render("home", 'Home',$this->generos);
        }
    }
    