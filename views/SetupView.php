<?php

namespace Views;

class SetupView extends View
{
    function avisoModal($mensagem)
    {
        echo "<script>
        $('#err').modal('show');
        _('result').innerHTML = '<center>" . $mensagem . "</center>' </script>";
    }
    function sucessoModal(){
        echo "
        <script>
            $('#sucessoModal').modal('show');
            
            setTimeout(() =>{
                $('#sucessoModal').modal('hide')
            },3000);    
        </script>";
    }
}
