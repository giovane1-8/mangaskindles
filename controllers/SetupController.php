<?php

    namespace Controllers;
    class SetupController extends Controller{
        public function __construct($view, $model){
            parent::__construct($view,$model);
        }

        public function index(){
            if ($_SESSION["isLogado"] && $_SESSION["nm_vip"] == "gm"){



            //render("NOME DO ARQUIVOU DO CORPO", 'TITULO DA PAGINA', 'CABEÇA DA PAGINA , FOOTER DA PAGINA')
                $this->view->render("setup",'Servidor',$this->generos,"setup", "setup" );
            }else{
                header("location: .");
            }           

        }
    }
    