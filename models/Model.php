<?php

namespace Models;

use PDO;

class Model
{
    protected object $PDO;
    function __construct()
    {
        $username = "root";
        $password = "";
        try {
            $this->PDO = new \PDO('mysql:host=localhost:3306;dbname=db_mangakindle', $username, $password, array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $this->PDO->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }
    function getAllGeneros()
    {
        $result = $this->PDO->prepare("SELECT * FROM tb_genero");
        $result->execute();
        $return = $result->fetchAll(PDO::FETCH_ASSOC);
        return $return;
    }


    function verificarNickname($nickname = null)
    {
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

    function verificarEmail($email = null)
    {
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
}
