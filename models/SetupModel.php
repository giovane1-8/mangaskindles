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

        $dirImg = "recursos\img\capas_mangas\\" .str_replace(["|","\\",":","/","*","?",'"',">","<"], "", strtolower($nome_manga)) . "." . $ext;

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





    function salvarGenero($dados){

        $sql = "INSERT INTO tb_genero (nm_genero) VALUES (?)";
        $nm_genero = ucfirst(strtolower(trim($dados["genero"])));
        $smtm = $this->PDO->prepare($sql);
        $smtm->bindParam(1,$nm_genero);

        if ($smtm->execute()) {
            $this->result = true;
        } else {
            $this->result = false;
        }
    }
}
