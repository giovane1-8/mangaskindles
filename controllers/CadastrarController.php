<?php

namespace Controllers;

class CadastrarController extends Controller
{
    private $dados;

    public function __construct($view, $model){
        parent::__construct($view, $model);
    }

    public function index(){
        if ($_SESSION['isLogado']) {
            header("location: " . VENDOR_PATH);
            die("recarregue a Pagina");
        }
            if (!empty($_POST)) {
                $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                $_SESSION["nm_nome"] = $this->dados["nome"];
                $_SESSION["nm_nickname"] = $this->dados["nickname"];
                $_SESSION["nm_email"] = $this->dados["email"];
                $_SESSION["nm_senha"] = $this->dados["senha"];
                $_SESSION['nm_cor_favorita'] = $this->dados["cor"];
                if (!empty($this->dados["nome"]) && !empty($this->dados["nickname"]) && !empty($this->dados["email"]) && !empty($this->dados["senha"]) && !empty($this->dados["cor"])) {
                    if ($this->model->verificarEmail($this->dados["email"])) {
                        $_SESSION['usuario'] = $this->dados["email"];
                        header("Location: " . VENDOR_PATH . "cadastrar/emailemuso");
                        die('recarregue a pagina');
                    } elseif ($this->model->verificarNickname($this->dados["nickname"])) {
                        $_SESSION['usuario'] = $this->dados["nickname"];                        
                        header("Location: " . VENDOR_PATH . "cadastrar/nicknameemuso");
                        die('recarregue a pagina');
                    } else {
                        $this->model->cadastrarUsuario($this->dados);
                    }
                }


                if ($this->model->getResultado()) {
                    header("Location: " . VENDOR_PATH . "login/cadastro");
                } else {
                    header("Location: " . VENDOR_PATH . "cadastrar/erro");
                }
            }


            \Router::rota("cadastrar/emailemuso", function () {
                $this->view->render("cadastrar", "Cadastrar", $this->generos);
                $this->view->msgEmail();
            });
            \Router::rota("cadastrar/nicknameemuso", function () {
                $this->view->render("cadastrar", "Cadastrar", $this->generos);
                $this->view->msgNickname();
            });
            \Router::rota("cadastrar/erro", function () {
                $this->view->render("cadastrar", "Erro", $this->generos);
                $this->view->msgErr();
            });

            //render("NOME DO ARQUIVOU DO CORPO", 'TITULO DA PAGINA', 'CABEÇA DA PAGINA , FOOTER DA PAGINA')

            $this->view->render("cadastrar", "Cadastrar", $this->generos);
    }
}
