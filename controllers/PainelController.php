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
                    define('OUTPUT', 'recursos\img\fotos_usuarios\\' . $imgName);
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
                        echo 'Imagem criada com sucesso<img id="thumbnail" src="' .VENDOR_PATH.OUTPUT. '" />';
                    } else {
                        echo 'Ocorreu um erro ao tentar criar a nova imagem';
                    }
                    unlink("recursos/img/tmp/" . $imgName);


                    if (!$this->model->addFotoPerfil(OUTPUT)) {
                        unlink("recursos\img\\fotos_usuarios\\" . $imgName);
                        echo "Erro ao Salvar imagem no banco de dados";
                    } else {
                        $a = explode(".", $_SESSION['nm_caminho_foto']);
                        $n = explode(".", $imgName);
                        if (end($a) != end($n)) {
                            if(substr($_SESSION['nm_caminho_foto'], -11) != "default.png"){
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
                            echo 'Por favor selecione um arquivo do tipo JPEG ou PNG.';
                        elseif ($fileError == 4)
                            echo 'Desculpe, mas o arquivo não foi enviado, por favor, tente novamente,';
                        elseif ($fileError == 3)
                            echo 'Desculpe, o envio do arquivo não foi completado com sucesso, por favor, tente novamente.';
                        elseif ($fileError == 2)
                            echo 'Esta imagem é muito grande, por favor, selecione uma imagem de até 2MB de tamanho!';
                        elseif ($fileError == 1)
                            echo 'Esta imagem é muito grande, por favor, selecione uma imagem de até 2MB de tamanho!';
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
                                echo 'Imagem criada com sucesso<img onload="getCoords();" id="toCrop" src="' .VENDOR_PATH.OUTPUT . '" /><input type="hidden" id="imgType" value="' . $fileType . '"/><input type="hidden" id="imgName" value="' . $newName . '"/>';
                            else
                                echo 'Ocorreu um erro ao tentar criar a nova imagem';
                        }
                    }
                }
            });

            \Router::rota("painel/nome", function () {
                if (!empty($_POST['nome'])) {
                    $this->model->atualizar($_POST['nome']);
                    $this->view->render("painel", 'Painel Do Usuario', $this->generos);
                } else {
                    $this->view->render("painel", 'Painel Do Usuario', $this->generos);
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
            \Router::rota("painel/nickname", function () {
                if (!empty($_POST['nickname'])) {
                } else {
                    $this->view->render("painel", 'Painel Do Usuario', $this->generos);
                }
            });
            \Router::rota("painel/email", function () {
                if (!empty($_POST['email'])) {
                } else {
                    $this->view->render("painel", 'Painel Do Usuario', $this->generos);
                }
            });
            \Router::rota("painel/senha", function () {
                if (!empty($_POST['senha'])) {
                } else {
                    $this->view->render("painel", 'Painel Do Usuario', $this->generos);
                }
            });
            \Router::rota("painel/cor", function () {
                if (!empty($_POST['cor'])) {
                } else {
                    $this->view->render("painel", 'Painel Do Usuario', $this->generos);
                }
            });









            //render("NOME DO ARQUIVOU DO CORPO", 'TITULO DA PAGINA', 'CABEÇA DA PAGINA , FOOTER DA PAGINA')

            $this->view->render("painel", 'Painel Do Usuario', $this->generos);
        } else {
            header('location: ' . VENDOR_PATH);
        }
    }
}
