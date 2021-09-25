<?php

namespace Controllers;

class LoginController extends Controller
{
    public static $dados;

    public function __construct($view, $model)
    {
        parent::__construct($view, $model);
    }

    public function index(){
        \Router::rota("login/sair", function () {
            session_destroy();
            $_SESSION['isLogado'] = false;
           header("Location: ".VENDOR_PATH);
        });

        if ($_SESSION['isLogado']) {
            \Router::rota("login/sucesso", function () {
                unset($_SESSION['usuario']);
                $this->view->render("home", 'Login Sucesso', $this->generos);
                $this->view->sucessoMsg();
            });

            header('location: ' . VENDOR_PATH);
            die("recarregue a pagina");
        }
        if (!empty($_POST)) {
            
            $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $_SESSION['usuario'] = $this -> dados['usuario'];

            $this->model->validarLogin($this->dados);
            if ($this->model->getResultado()) {
                header("location: " . VENDOR_PATH . "login/sucesso");
            } else {
                header("location: " . VENDOR_PATH . "login/erro");
            }
        }

        \Router::rota("login/erro", function () {
            $this->view->render("login", 'Erro Login', $this->generos);
            $this->view->errMsg();
        });

       
        \Router::rota("login/recuperarsenha", function () {
            echo "recuperar senha";
        });

        \Router::rota("login/cadastro", function () {
            if(!empty($_SESSION['nm_email']) && $_SESSION['nm_senha']){
                $_SESSION['usuario'] = $this -> dados['usuario'];

                $this->dados = array('usuario' => $_SESSION['nm_email'], 'senha' => $_SESSION['nm_senha']);
                $this->model->validarLogin($this->dados);
                if ($this->model->getResultado()) {
                    header("location: " . VENDOR_PATH . "login/sucesso");
                } else {
                    header("location: " . VENDOR_PATH . "login/erro");
                }
            }
        });

        $this->view->render("login", 'Login', $this->generos);


       
    }
}
