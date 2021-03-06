<?php

namespace Controllers;

class PainelController extends Controller
{
    public function __construct($view, $model)
    {
        parent::__construct($view, $model);
    }

    public function index()
    {
        if ($_SESSION["isLogado"]) {
            \Router::rota("painel/crop", function () {
                if (!empty($_POST)) {
                    sleep(1);

                    $fileType = $_POST['imgType'];
                    $imgName  = $_POST['imgName'];
                    define('OUTPUT', 'recursos/img/fotos_usuarios/' . $imgName);
                    if ($fileType == 'image/png') {
                        $img = imagecreatefrompng('recursos/img/tmp/' . $imgName);
                    } else {
                        $img = imagecreatefromjpeg('recursos/img/tmp/' . $imgName);
                    }
                    $imgWidth  = imagesx($img);
                    $imgHeight = imagesy($img);
                    $newImage = imagecreatetruecolor(160, 160);
                    imagecopyresampled($newImage, $img, 0, 0, $_POST['x'], $_POST['y'], 160, 160, $_POST['w'], $_POST['h']);
                    if ($fileType == 'image/png') {
                        $finalImage = imagepng($newImage, OUTPUT);
                    } else {
                        $finalImage = imagejpeg($newImage, OUTPUT);
                    }
                    if ($finalImage) {
                        $this->view->echoVar('Imagem criada com sucesso<img id="thumbnail" src="' . VENDOR_PATH . OUTPUT . '" />');
                    } else {
                        $this->view->echoVar('Ocorreu um erro ao tentar criar a nova imagem');
                    }
                    unlink("recursos/img/tmp/" . $imgName);


                    if (!$this->model->addFotoPerfil(OUTPUT)) {
                        unlink("recursos/img/fotos_usuarios/" . $imgName);
                        $this->view->echoVar("Erro ao Salvar imagem no banco de dados");
                    } else {
                        $a = explode(".", $_SESSION['nm_caminho_foto']);
                        $n = explode(".", $imgName);
                        if (end($a) != end($n)) {
                            if (substr($_SESSION['nm_caminho_foto'], -11) != "default.png") {
                                unlink($_SESSION["nm_caminho_foto"]);
                            }
                        }
                        $_SESSION["nm_caminho_foto"] = OUTPUT;
                    }
                }
            });

            \Router::rota("painel/recebe", function () {
                if (!empty($_POST)) {
                    if (!isset($_FILES['arquivo']['name']))
                        exit("selecione um arquivo");
                    else {
                        sleep(1);
                        $fileName  = $_FILES['arquivo']['name'];
                        $fileTMP   = $_FILES['arquivo']['tmp_name'];
                        $fileType  = $_FILES['arquivo']['type'];
                        $fileError = $_FILES['arquivo']['error'];
                        $fileEXT   = explode('.', $fileName);
                        $newName   = $_SESSION["id_usuario"] . '.' . end($fileEXT);
                        $permitido = array('image/png', 'image/jpeg');
                        define('OUTPUT', 'recursos/img/tmp/' . $newName);
                        if (in_array($fileType, $permitido) == false)
                            $this->view->echoVar('Por favor selecione um arquivo do tipo JPEG ou PNG.');
                        elseif ($fileError == 4)
                            $this->view->echoVar('Desculpe, mas o arquivo n??o foi enviado, por favor, tente novamente,');
                        elseif ($fileError == 3)
                            $this->view->echoVar('Desculpe, o envio do arquivo n??o foi completado com sucesso, por favor, tente novamente.');
                        elseif ($fileError == 2)
                            $this->view->echoVar('Esta imagem ?? muito grande, por favor, selecione uma imagem de at?? 2MB de tamanho!');
                        elseif ($fileError == 1)
                            $this->view->echoVar('Esta imagem ?? muito grande, por favor, selecione uma imagem de at?? 2MB de tamanho!');
                        else {
                            if ($fileType == 'image/png')
                                $img = imagecreatefrompng($fileTMP);
                            else
                                $img = imagecreatefromjpeg($fileTMP);
                            $imgWidth  = imagesx($img);
                            $imgHeight = imagesy($img);
                            if ($imgWidth > 500) {
                                $x = 500;
                                $y = ceil(($imgHeight / $imgWidth) * $x);
                            } else {
                                $x = $imgWidth;
                                $y = $imgHeight;
                            }
                            if ($y > 500) {
                                $y2 = 500;
                                $x  = ceil(($x / $y) * $y2);
                                $y  = $y2;
                            }
                            $newImage = imagecreatetruecolor($x, $y);
                            imagecopyresampled($newImage, $img, 0, 0, 0, 0, $x, $y, $imgWidth, $imgHeight);
                            if ($fileType == 'image/png')
                                $finalImage = imagepng($newImage, OUTPUT);
                            else
                                $finalImage = imagejpeg($newImage, OUTPUT);
                            if ($finalImage)
                                $this->view->echoVar('Imagem criada com sucesso<img onload="getCoords();" id="toCrop" src="' . VENDOR_PATH . OUTPUT . '" /><input type="hidden" id="imgType" value="' . $fileType . '"/><input type="hidden" id="imgName" value="' . $newName . '"/>');
                            else
                                $this->view->echoVar('Ocorreu um erro ao tentar criar a nova imagem');
                        }
                    }
                }
            });

            \Router::rota("painel/excluirfoto", function () {
                if (!empty($_POST)) {
                    unlink($_SESSION["nm_caminho_foto"]);
                    $this->model->removerCaminhoFoto();
                    $_SESSION["nm_caminho_foto"] = "recursos/img/fotos_usuarios/default.png";
                    header('location: painel/..');
                }
            });
            \Router::rota("painel/atualizar/nome", function () {
                if (!empty($_POST['nome'])) {
                    $nome = trim($_POST['nome']);
                    if (strlen($nome) <= 45) {

                        if ($this->model->atualizar([$nome], ["nm_usuario"])) {
                            $_SESSION['nm_usuario'] = $nome;
                        };
                        header("location: " . VENDOR_PATH . "painel");
                    } else {
                        $this->view->render("painel", 'Painel Do Usuario', $this->generos);
                        $this->view->avisoModal("Numero maximo permitido ?? de 45 caracteres");
                    }
                } else {
                    header("location: " . VENDOR_PATH . "painel");
                }
            });

            \Router::rota("painel/atualizar/nickname", function () {
                if (!empty($_POST['nickname'])) {
                    $nickaname = trim($_POST['nickname']);
                    if (strlen($nickaname) <= 20) {
                        if (!$this->model->verificarNickname($nickaname)) {
                            if ($this->model->atualizar([$nickaname], ["nm_nickname"])) {
                                $_SESSION['nm_nickname'] = $nickaname;
                            };
                            header("location: " . VENDOR_PATH . "painel");
                        } else {
                            $this->view->render("painel", 'Painel Do Usuario', $this->generos);
                            $this->view->avisoModal("Nickname j?? esta em uso");
                        }
                    } else {
                        $this->view->render("painel", 'Painel Do Usuario', $this->generos);
                        $this->view->avisoModal("Numero maximo permitido ?? de 20 caracteres");
                    }
                } else {
                    header("location: " . VENDOR_PATH . "painel");
                }
            });

            \Router::rota("painel/atualizar/email", function () {
                if (!empty($_POST['email'])) {
                    $email = trim($_POST['email']);
                    if (!$this->model->verificarEmail($email)) {
                        if ($this->model->atualizar([$email], ["nm_email"])) {
                            $_SESSION['nm_email'] = $email;
                        };
                        header("location: " . VENDOR_PATH . "painel");
                    } else {
                        $this->view->render("painel", 'Painel Do Usuario', $this->generos);
                        $this->view->avisoModal("Email j?? esta em uso");
                    }
                } else {
                    header("location: " . VENDOR_PATH . "painel");
                }
            });
            \Router::rota("painel/atualizar/senha", function () {
                if (!empty($_POST['senha'])) {
                    $senha = trim($_POST['senha']);
                    if ($this->model->atualizar([$senha], ["nm_senha"])) {
                        $_SESSION['nm_senha'] = $senha;
                    };
                    header("location: " . VENDOR_PATH . "painel");
                } else {
                    header("location: " . VENDOR_PATH . "painel");
                }
            });
            \Router::rota("painel/atualizar/cor", function () {
                if (!empty($_POST['cor'])) {
                    $cor = trim($_POST['cor']);
                    if ($this->model->atualizar([$cor], ["nm_cor_favorita"])) {
                        $_SESSION['nm_cor_favorita'] = $cor;
                    };
                    header("location: " . VENDOR_PATH . "painel");
                } else {
                    header("location: " . VENDOR_PATH . "painel");
                }
            });
            //render("NOME DO ARQUIVOU DO CORPO", 'TITULO DA PAGINA', 'CABE??A DA PAGINA , FOOTER DA PAGINA')

            $this->view->render("painel", 'Painel Do Usuario', $this->generos);
        } else {
            header('location: ' . VENDOR_PATH);
        }
    }
}
