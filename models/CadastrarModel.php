<?php

namespace Models;

class CadastrarModel extends Model
{

    private $resultado = false;

    function getResultado()
    {
        return $this->resultado;
    }

    function cadastrarUsuario(array $dados = null)
    {

        $sql = "INSERT INTO tb_usuario (nm_usuario,nm_email,nm_senha,nm_nickname,nm_cor_favorita) 
                       VALUES (?,?,?,?,?)";
        $smtm = $this->PDO->prepare($sql);
        $smtm->bindParam(1, $dados["nome"], \PDO::PARAM_STR);
        $smtm->bindParam(2, $dados["email"], \PDO::PARAM_STR);
        $smtm->bindParam(3, $dados["senha"], \PDO::PARAM_STR);
        $smtm->bindParam(4, $dados["nickname"], \PDO::PARAM_STR);
        $smtm->bindParam(5, $dados["cor"], \PDO::PARAM_STR);

        if ($smtm->execute()) {
            $this->resultado = true;
        }
    }

}
