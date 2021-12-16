<?php

namespace Models;

class CadastrarModel extends Model{

    private $resultado = false;

    function getResultado(){
        return $this->resultado;
    }

    function cadastrarUsuario(array $dados = null){

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
    function verificarEmail($email = null){
        $query = $this->PDO->prepare("SELECT nm_email FROM tb_usuario WHERE nm_email = :email LIMIT 1");
        $query->bindParam(":email", $email);
        $query->execute();
        $email = $query->fetch();

        if (!empty($email)) {
            return true;
        } else {
            return false;
        }
    }

    function verificarNickname($nickname = null){
        $query = $this->PDO->prepare("SELECT nm_nickname FROM tb_usuario WHERE nm_nickname = :nickname LIMIT 1");
        $query->bindParam(":nickname", $nickname);
        $query->execute();
        $nickname = $query->fetch();

        if (!empty($nickname)) {
            return true;
        } else {
            return false;
        }
    }


}
