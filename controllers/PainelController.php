<?php

    namespace Controllers;
    class PainelController extends Controller{
        public function __construct($view, $model){
            parent::__construct($view,$model);
        }

        public function index(){
        //render("NOME DO ARQUIVOU DO CORPO", 'TITULO DA PAGINA', 'CABEÇA DA PAGINA , FOOTER DA PAGINA')
        if($_SESSION["isLogado"]){
            $this->view->render("painel", 'Painel Do Usuario',$this->generos);
        }else{
            header('location: '. VENDOR_PATH);
        }
        }
    }
    