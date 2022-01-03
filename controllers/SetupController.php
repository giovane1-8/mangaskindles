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


            # VALIDAR E ADICIONAR MANGA NO BANCO DE DADOS
            \Router::rota("setup/addmanga", function () {
                if (!empty($_POST)) {
                    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                    $dados["imagem_manga"] = $_FILES["imagem_manga"];
                    $permitido = array('png', 'jpeg');
                    var_dump($dados);
                    if (count($dados) == 6 && $dados["generos"] != 0 && !empty($dados["nome_manga"]) && !empty($dados["editora"]) && !empty($dados["sinopse"]) && !empty($dados["imagem_manga"]) && !empty($dados["botao_submit"])) {
                        $ext = explode(".", $dados["imagem_manga"]['name']);
                        list($largura, $altura) = getimagesize($dados["imagem_manga"]["tmp_name"]);
                        if (in_array(strtolower(end($ext)), $permitido)) {
                            $dados["nome_manga"] = ucfirst($dados["nome_manga"]);
                            $this->model->salvarManga($dados);

                            if ($this->model->getResult()) {
                                header("location: " . VENDOR_PATH . "setup/sucesso");
                            } else {
                                header("location: " . VENDOR_PATH . "setup/erroBd");
                            }
                        } elseif ($largura != 784 || $altura != 436) {
                            header("location: " . VENDOR_PATH . "setup/erroImg");
                        } else {
                            header("location: " . VENDOR_PATH . "setup/erro");
                        }
                    } else {
                        header("location: " . VENDOR_PATH . "setup/erro");
                    }
                } else {
                    header("location: " . VENDOR_PATH . "setup");
                }
            });
            # VALIDAR E ADICIONAR GENERO NO BANCO DE DADOS
            \Router::rota("setup/addgenero", function () {
                if (!empty($_POST)) {
                    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);



                    if (!empty($dados["botao_submit"]) && !empty($dados["genero"]) && (trim($dados["genero"]) != null)) {

                        $this->model->salvarGenero($dados);

                        if ($this->model->getResult()) {
                            header("location: " . VENDOR_PATH . "setup/sucesso");
                        } else {
                            header("location: " . VENDOR_PATH . "setup/erroBd");
                        }
                    }
                } else {
                    header("location: " . VENDOR_PATH . "setup");
                }
            });
            // ROTAS DE MENSAGENS ==================================
            \Router::rota("setup/erro", function () {
                $this->view->render("setupPags/setup", 'Servidor', $this->generos, "setup", "setup");
                $this->view->avisoModal("Erro ao enviar os dados, tente novamente");
            });
            \Router::rota("setup/erroImg", function () {
                $this->view->render("setupPags/setup", 'Servidor', $this->generos, "setup", "setup");
                $this->view->avisoModal("Insira a imagem com tamanho 784 x 436");
            });
            \Router::rota("setup/erro", function () {
                $this->view->render("setupPags/setup", 'Servidor', $this->generos, "setup", "setup");
                $this->view->avisoModal("Erro ao enviar os dados, tente novamente");
            });
            \Router::rota("setup/erroBd", function () {
                $this->view->render("setupPags/setup", 'Servidor', $this->generos, "setup", "setup");
                $this->view->avisoModal("Erro ao salvar no banco de dados");
            });
            \Router::rota("setup/sucesso", function () {
                $this->view->render("setupPags/setup", 'Servidor', $this->generos, "setup", "setup");
                $this->view->sucessoModal();
            });

            #PAGINA PARA EXCLUSÃO
            \Router::rota("setup/excluir", function () {
                $this->view->render("setupPags/excluir", 'Servidor', $this->generos, "setup", "setup");
            });








            #ROTA DE MSN PARA PAGINA DA EXCLUSÃO
            \Router::rota("setup/excluir/manga", function () {
                if (!empty($_POST["manga"])) {
                    $idmanga = $_POST["manga"];
                    $this->model->excluirManga($idmanga);

                    if ($this->model->getResult()) {
                        header("location: " . VENDOR_PATH . "setup/excluir/sucesso");
                    } else {
                        header("location: " . VENDOR_PATH . "setup/excluir/erro");
                    }
                }
            });

            \Router::rota("setup/excluir/genero", function () {
                if (!empty($_POST)) {
                    $idgenero = $_POST["genero"];

                    $this->model->excluirGenero($idgenero);

                    if ($this->model->getResult()) {
                        header("location: " . VENDOR_PATH . "setup/excluir/sucessoGenero");
                    } else {
                        header("location: " . VENDOR_PATH . "setup/excluir/erroGenero");
                    }
                } else {
                    header("location: " . VENDOR_PATH . "setup/excluir");
                }
            });

            \Router::rota("setup/excluir/sucesso", function () {
                $this->view->render("setupPags/excluir", 'Servidor', $this->generos, "setup", "setup");
                $this->view->avisoModal("Manga Excluido com sucesso");
            });
            \Router::rota("setup/excluir/erro", function () {
                $this->view->render("setupPags/excluir", 'Servidor', $this->generos, "setup", "setup");
                $this->view->avisoModal('<font color="red">Erro</font> ao apagar manga');
            });


            \Router::rota("setup/excluir/sucessoGenero", function () {
                $this->view->render("setupPags/excluir", 'Servidor', $this->generos, "setup", "setup");
                $this->view->avisoModal("Genero Excluido com sucesso");
            });
            \Router::rota("setup/excluir/erroGenero", function () {
                $this->view->render("setupPags/excluir", 'Servidor', $this->generos, "setup", "setup");
                $this->view->avisoModal('<font color="red">Erro</font> ao apagar Genero');
            });

            //render("NOME DO ARQUIVOU DO CORPO", 'TITULO DA PAGINA', 'CABEÇA DA PAGINA , FOOTER DA PAGINA')
            $this->view->render("setupPags/setup", 'Servidor', $this->generos, "setup", "setup");
        } else {
            header("location: .");
        }
    }
}
