<?php
    namespace Models;
    use PDO;
    class Model{
        protected object $PDO;
        function __construct(){
            $username = "root";
            $password = "";
            try {
                $this -> PDO = new \PDO('mysql:host=localhost:3306;dbname=db_mangakindle', $username, $password, array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                $this -> PDO -> setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } catch ( \PDOException $e) {
                echo 'ERROR: ' . $e->getMessage();
            }
        }
        function getAllGeneros(){
            $result = $this -> PDO ->prepare("SELECT * FROM tb_genero");
            $result -> execute();
            $return = $result -> fetchAll(PDO::FETCH_ASSOC);
            return $return; 
        }
    }