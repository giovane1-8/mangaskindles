<?php

    namespace Views;

    class View{
        CONST PATHPAGES = "paginas/";
        
        public $dadosModel;
        public $titlePage;

        public function render($fileName, $titlePage, $AllGeneros = null , $head = null, $footer = null){ 
            echo \Controllers\LoginController:: $dados;
            $this -> titlePage = $titlePage;
            
            if ($head == null){
                include(self::PATHPAGES."head/head.php");
            }else{
                include(self::PATHPAGES."head/".$head.".php");
            }

            include(self::PATHPAGES.$fileName.".php");
            
            if($footer == null){
                include(self::PATHPAGES."footer/footer.php");
            }else{
                include(self::PATHPAGES."footer/".$footer.".php"); 
            }

        }
    }