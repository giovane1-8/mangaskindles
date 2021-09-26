<?php

namespace Views;

class LoginView extends View
{

    function errMsg()
    {
        echo "            
                <div style='color: black' class='modal fade' id='ExemploModalCentralizado' tabindex='-1' role='dialog' aria-labelledby='TituloModalCentralizado' aria-hidden='true'>
                    <div class='modal-dialog modal-dialog-centered' role='document'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='TituloModalCentralizado'>Email ou Senha <font color='red'>INCORRETOS</font></h5>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                            <div class='modal-body'>
                                Se não tiver um conta crie uma;
                            </div>
                            <div class='modal-footer'>
                                <a href= '" . VENDOR_PATH . "cadastrar'> <button  class='btn btn-primary'>CRIAR UMA CONTA</button><a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <script>
                    $('#ExemploModalCentralizado').modal('show');
                    setTimeout(() =>{
                        debugger
                     },3000);
                    setTimeout(() =>{
                        $('#ExemploModalCentralizado').modal('hide')
                    },3000);
                </script>
            ";
    }


    function sucessoMsg()
    {
        echo "       
            <div class='modal fade' id='ExemploModalCentralizado' tabindex='-1' role='dialog' aria-labelledby='TituloModalCentralizado' aria-hidden='true'>
                <div class='modal-dialog modal-dialog-centered' role='document'>
                <div class='modal-content'>
                    <div class='modal-header'>
                    <h5 class='modal-title' id='TituloModalCentralizado'>Logado com <font color='green'>SUCESSO</font></h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                    </div>
                    <div class='modal-body'>
                    Bem vindo <font color ='" . $_SESSION['nm_cor_favorita'] . "'>" . $_SESSION['nm_nickname'] . "</font>
                    </div>
                </div>
                </div>
            </div>
            <script>

                $('#ExemploModalCentralizado').modal('show');
                
                setTimeout(() =>{
                    $('#ExemploModalCentralizado').modal('hide')
                },3000);    
            </script>
        ";
    }
}
