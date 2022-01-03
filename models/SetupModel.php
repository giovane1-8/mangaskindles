<?php

namespace Models;

class SetupModel extends Model
{
    protected $result;
    function getResult()
    {
        return $this->result;
    }
    function salvarManga($dados)
    {
        $sql = "INSERT INTO tb_manga (nm_manga,nm_editora,nm_sinopse,nm_caminho_capa,cd_capitulos_totais) 
                       VALUES (?,?,?,?,?)";
        $nome_manga = trim($dados["nome_manga"]);
        $editora = trim($dados["editora"]);
        $sinopse = trim($dados["sinopse"]);
        $zero = 0;
        $nameExplode = explode(".", strtolower(trim($dados["imagem_manga"]['name'])));
        $ext = end($nameExplode);

        $dirImg = "recursos\img\capas_mangas\\" . str_replace(["|", "\\", ":", "/", "*", "?", '"', ">", "<"], "", strtolower($nome_manga)) . "." . $ext;

        $smtm = $this->PDO->prepare($sql);
        $smtm->bindParam(1, $nome_manga);
        $smtm->bindParam(2, $editora);
        $smtm->bindParam(3, $sinopse);
        $smtm->bindParam(4, $dirImg);
        $smtm->bindParam(5, $zero, \PDO::PARAM_INT);
        var_dump($dirImg);

        if (($smtm->execute()) && (move_uploaded_file($dados["imagem_manga"]["tmp_name"], $dirImg))) {
            $id_manga = $this->PDO->lastInsertId();
            $generos = $dados["generos"];
            for ($i = 0; $i < count($generos); $i++) {
                $sql = "INSERT INTO tb_manga_genero (id_manga,id_genero) VALUES (?,?)";
                $smtm = $this->PDO->prepare($sql);
                $smtm->bindParam(1, $id_manga);
                $smtm->bindParam(2, $generos[$i]);
                $smtm->execute();
            }
            $this->result = true;
        } else {
            $this->result = false;
        }
    }



    function excluirManga($idmanga)
    {
        $smtm = $this->PDO->prepare("SELECT m.nm_caminho_capa, vm.nm_caminho_capa FROM tb_manga as m
        LEFT JOIN tb_volume_manga as vm ON m.id_manga = vm.id_manga
        WHERE m.id_manga = :idmanga;");
        $smtm->bindParam(":idmanga", $idmanga);
        $smtm->execute();
        $queryCapa = $smtm->fetchAll($this->PDO::FETCH_NAMED);

        if (!empty($queryCapa)) {
            $sql = "DELETE mg FROM tb_manga as m
                        LEFT JOIN tb_manga_genero as mg ON m.id_manga = mg.id_manga 
                        LEFT JOIN tb_like as l ON m.id_manga = l.id_manga 
                        LEFT JOIN tb_volume_manga as vm ON m.id_manga = vm.id_manga
                        
                        LEFT JOIN tb_formato_volume as fv ON fv.id_volume_manga = vm.id_volume_manga
                        LEFT JOIN tb_comentario as c ON c.id_volume_manga = vm.id_volume_manga
                        LEFT JOIN tb_download as d ON d.id_volume = fv.id_volume
                            WHERE m.id_manga = :idmanga ;
                
                
                    DELETE d FROM tb_manga as m
                        LEFT JOIN tb_manga_genero as mg ON m.id_manga = mg.id_manga 
                        LEFT JOIN tb_like as l ON m.id_manga = l.id_manga 
                        LEFT JOIN tb_volume_manga as vm ON m.id_manga = vm.id_manga
                        
                        LEFT JOIN tb_formato_volume as fv ON fv.id_volume_manga = vm.id_volume_manga
                        LEFT JOIN tb_comentario as c ON c.id_volume_manga = vm.id_volume_manga
                        LEFT JOIN tb_download as d ON d.id_volume = fv.id_volume
                            WHERE m.id_manga = :idmanga ;
                    
                        
                        
                    DELETE c FROM tb_manga as m
                        LEFT JOIN tb_manga_genero as mg ON m.id_manga = mg.id_manga 
                        LEFT JOIN tb_like as l ON m.id_manga = l.id_manga 
                        LEFT JOIN tb_volume_manga as vm ON m.id_manga = vm.id_manga
                        
                        LEFT JOIN tb_formato_volume as fv ON fv.id_volume_manga = vm.id_volume_manga
                        LEFT JOIN tb_comentario as c ON c.id_volume_manga = vm.id_volume_manga
                        LEFT JOIN tb_download as d ON d.id_volume = fv.id_volume
                            WHERE m.id_manga = :idmanga ;
                    
                    
                    
                        
                        
                    DELETE fv FROM tb_manga as m
                        LEFT JOIN tb_manga_genero as mg ON m.id_manga = mg.id_manga 
                        LEFT JOIN tb_like as l ON m.id_manga = l.id_manga 
                        LEFT JOIN tb_volume_manga as vm ON m.id_manga = vm.id_manga
                        
                        LEFT JOIN tb_formato_volume as fv ON fv.id_volume_manga = vm.id_volume_manga
                        LEFT JOIN tb_comentario as c ON c.id_volume_manga = vm.id_volume_manga
                        LEFT JOIN tb_download as d ON d.id_volume = fv.id_volume
                            WHERE m.id_manga = :idmanga ;
                        
                        
                    DELETE vm FROM tb_manga as m
                        LEFT JOIN tb_manga_genero as mg ON m.id_manga = mg.id_manga 
                        LEFT JOIN tb_like as l ON m.id_manga = l.id_manga 
                        LEFT JOIN tb_volume_manga as vm ON m.id_manga = vm.id_manga
                        
                        LEFT JOIN tb_formato_volume as fv ON fv.id_volume_manga = vm.id_volume_manga
                        LEFT JOIN tb_comentario as c ON c.id_volume_manga = vm.id_volume_manga
                        LEFT JOIN tb_download as d ON d.id_volume = fv.id_volume
                            WHERE m.id_manga = :idmanga ;
                    
                        
                        
                    DELETE l FROM tb_manga as m
                        LEFT JOIN tb_manga_genero as mg ON m.id_manga = mg.id_manga 
                        LEFT JOIN tb_like as l ON m.id_manga = l.id_manga 
                        LEFT JOIN tb_volume_manga as vm ON m.id_manga = vm.id_manga
                        
                        LEFT JOIN tb_formato_volume as fv ON fv.id_volume_manga = vm.id_volume_manga
                        LEFT JOIN tb_comentario as c ON c.id_volume_manga = vm.id_volume_manga
                        LEFT JOIN tb_download as d ON d.id_volume = fv.id_volume
                            WHERE m.id_manga = :idmanga ;
                                
                        
                    DELETE m FROM tb_manga as m
                        LEFT JOIN tb_manga_genero as mg ON m.id_manga = mg.id_manga 
                        LEFT JOIN tb_like as l ON m.id_manga = l.id_manga 
                        LEFT JOIN tb_volume_manga as vm ON m.id_manga = vm.id_manga
                        
                        LEFT JOIN tb_formato_volume as fv ON fv.id_volume_manga = vm.id_volume_manga
                        LEFT JOIN tb_comentario as c ON c.id_volume_manga = vm.id_volume_manga
                        LEFT JOIN tb_download as d ON d.id_volume = fv.id_volume
                            WHERE m.id_manga = :idmanga; ";


            $smtm = $this->PDO->prepare($sql);
            $smtm->bindParam(":idmanga", $idmanga);

            if ($smtm->execute()) {
                unlink($queryCapa[0]["nm_caminho_capa"][0]);
                foreach ($queryCapa as $key => $value) {
                    unlink($value["nm_caminho_capa"][1]);
                }
                $this->result = true;
            } else {
                $this->result = false;
            }
        } else {
            $this->result = false;
        }
    }

    function salvarGenero($dados)
    {

        $sql = "INSERT INTO tb_genero (nm_genero) VALUES (?)";
        $nm_genero = ucfirst(strtolower(trim($dados["genero"])));
        $smtm = $this->PDO->prepare($sql);
        $smtm->bindParam(1, $nm_genero);

        if ($smtm->execute()) {

            $this->result = true;
        } else {
            $this->result = false;
        }
    }

    function excluirGenero($idgenero)
    {
        $sql = "DELETE tb_manga_genero FROM tb_genero LEFT JOIN tb_manga_genero
                    ON tb_genero.id_genero = tb_manga_genero.id_genero 
                        WHERE tb_genero.id_genero = :idgenero;

                DELETE tb_genero FROM tb_genero LEFT JOIN tb_manga_genero
                    ON tb_genero.id_genero = tb_manga_genero.id_genero 
                        WHERE tb_genero.id_genero = :idgenero;
        ";
        $smtm = $this->PDO->prepare($sql);
        $smtm->bindParam(":idgenero", $idgenero);


        if ($smtm->execute()) {

            $this->result = true;
        } else {
            $this->result = false;
        }
    }
}
