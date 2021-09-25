<?php
    namespace Views;

    class CadastrarView extends View{
        function msgSucesso(){
            echo "
            <div class='modal fade' id='ExemploModalCentralizado' tabindex='-1' role='dialog' aria-labelledby='TituloModalCentralizado' aria-hidden='true'>
                <div class='modal-dialog modal-dialog-centered' role='document'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title' id='TituloModalCentralizado'>Cadastrado com <font color ='green'>SUCESSO</font></h5>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                        <div class='modal-body'>
                            faça login para acessar sua conta;
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $('#ExemploModalCentralizado').modal('show');
            
                setTimeout(() =>{
                    $('#ExemploModalCentralizado').modal('hide')
                },3000);            
            </script>";
        }
        function msgErr(){
            echo "
            <div class='modal fade' id='ExemploModalCentralizado' tabindex='-1' role='dialog' aria-labelledby='TituloModalCentralizado' aria-hidden='true'>
                <div class='modal-dialog modal-dialog-centered' role='document'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title' id='TituloModalCentralizado'>ERRO DE CADASTRO</h5>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                        <div class='modal-body'>
                        <font color ='red'>Preencha todos os dados corretamente</font>;
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $('#ExemploModalCentralizado').modal('show');
            
                setTimeout(() =>{
                    $('#ExemploModalCentralizado').modal('hide')
                },3000);            
            </script>";
        }
        function msgEmail(){
            echo "
            <div class='modal fade' id='ExemploModalCentralizado' tabindex='-1' role='dialog' aria-labelledby='TituloModalCentralizado' aria-hidden='true'>
                <div class='modal-dialog modal-dialog-centered' role='document'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title' id='TituloModalCentralizado'>EMAIL EM USO</h5>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                        <div class='modal-body'>
                            Use outro email ou recupere a senha
                        </div>
                        <div class='modal-footer'>
                            <a href= '" . VENDOR_PATH . "login/recuperarsenha'> <button  class='btn btn-primary'>RECUPERAR SENHA</button><a>
                            <a href= '" . VENDOR_PATH . "login'> <button  class='btn btn-primary'>Fazer Login</button><a>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $('#ExemploModalCentralizado').modal('show');
            
                setTimeout(() =>{
                    $('#ExemploModalCentralizado').modal('hide')
                },5000);            
            </script>";
        }
        
        function msgNickname(){
            echo "
            <div class='modal fade' id='ExemploModalCentralizado' tabindex='-1' role='dialog' aria-labelledby='TituloModalCentralizado' aria-hidden='true'>
                <div class='modal-dialog modal-dialog-centered' role='document'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title' id='TituloModalCentralizado'>NICKNAME EM USO</h5>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                        <div class='modal-body'>
                            Use outro apelido ou recupere a senha
                        </div>
                        <div class='modal-footer'>
                            <a href= '" . VENDOR_PATH . "login/recuperarsenha'> <button  class='btn btn-primary'>RECUPERAR SENHA</button><a>
                            <a href= '" . VENDOR_PATH . "login'> <button  class='btn btn-primary'>Fazer Login</button><a>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $('#ExemploModalCentralizado').modal('show');
            
                setTimeout(() =>{
                    $('#ExemploModalCentralizado').modal('hide')
                },5000);            
            </script>";
        }
    }
       
    