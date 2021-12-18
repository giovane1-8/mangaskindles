<?php

namespace Views;

class SetupView extends View
{
    function erroModal()
    {
        echo "    
            <script>
                $('#err').modal('show');
                setTimeout(() =>{
                    $('#err').modal('hide')
                },3000);
            </script>";
    }
}
