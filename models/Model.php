<?php
    namespace Models;
    use PDO;
    class Model{
        protected object $PDO;
        function __construct(){
            $username = "id17652484_giovane";
            $password = "p?x~qZ@K~8XYtL9@";
            try {
                $this -> PDO = new \PDO('mysql:host=localhost:3306;dbname=id17652484_db_mangaskindles', $username, $password, array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
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