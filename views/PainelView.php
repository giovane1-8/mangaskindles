<?php
    namespace Views;

    class PainelView extends View{
        
        function avisoModal($mensagem){
            echo "<script>
            $('.modal_alert_painel').modal('show');
            _('result').innerHTML = '<center>".$mensagem."</center>' </script>";
        }
       
    }