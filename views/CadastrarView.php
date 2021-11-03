<?php

namespace Views;

class CadastrarView extends View
{
    function msgSucesso()
    {
        echo "
            
<script>
                $('#sucessoModal').modal('show');
            
                setTimeout(() =>{
                    $('#sucessoModal').modal('hide')
                },3000);            
            </script>";
    }
    function msgErr()
    {
        echo "
            
            <script>
                $('#err').modal('show');
            
                setTimeout(() =>{
                    $('#err').modal('hide')
                },3000);            
            </script>";
    }
    function msgEmail()
    {
        echo "
            
            <script>
                $('#ExemploModalCentralizado').modal('show');
            
                setTimeout(() =>{
                    $('#ExemploModalCentralizado').modal('hide')
                },5000);            
            </script>";
    }

    function msgNickname()
    {
        echo "
            
            <script>
                $('#nicknameerr').modal('show');
            
                setTimeout(() =>{
                    $('#nicknameerr').modal('hide')
                },5000);            
            </script>";
    }
}
