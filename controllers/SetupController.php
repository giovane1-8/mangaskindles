<?php

namespace Controllers;

class SetupController extends Controller
{
    public function __construct($view, $model)
    {
        parent::__construct($view, $model);
    }

    public function index()
    {
        if ($_SESSION["isLogado"] && $_SESSION["nm_vip"] == "gm") {

            \Router::rota("setup/addmanga", function () {
                if (!empty($_POST)) {
                    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                    $dados["imagem_manga"] = $_FILES["imagem_manga"];
                    if (count($dados) == 6 && $dados["generos"] != 0 && !empty($dados["nome_manga"]) && !empty($dados["editora"]) && !empty($dados["sinopse"]) && !empty($dados["imagem_manga"]) && !empty($dados["botao_submit"])) {
                    echo"foi";
                    } else {
                        header("location: " . VENDOR_PATH . "setup/erro");
                    }
                } else {
                    header("location: " . VENDOR_PATH . "setup");
                }
            });
            \Router::rota("setup/erro", function () {
                $this->view->render("setup", 'Servidor', $this->generos, "setup", "setup");
                $this->view->erroModal();
            });
            //render("NOME DO ARQUIVOU DO CORPO", 'TITULO DA PAGINA', 'CABEÇA DA PAGINA , FOOTER DA PAGINA')
            $this->view->render("setup", 'Servidor', $this->generos, "setup", "setup");
        } else {
            header("location: .");
        }
    }
}
