<?php

namespace Views;

class LoginView extends View
{

    function errMsg()
    {
        echo "            
                <script>
                    $('#err').modal('show');
                    setTimeout(() =>{
                        $('#err').modal('hide')
                    },5000);
                </script>
            ";
    }


    function sucessoMsg()
    {
        echo "       
            <script>
                $('#sucessoModal').modal('show');
                
                setTimeout(() =>{
                    $('#sucessoModal').modal('hide')
                },3000);    
            </script>
        ";
    }
}
