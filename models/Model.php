<?php
    namespace Models;
    use PDO;
    class Model{
        protected object $PDO;
        function __construct(){
            $username = "nwdlseoncbxaab";
            $password = "e288fe6e576699d91e52bc300c2ebce092edd89fab3b33f526c765904cd866ee";
            try {
                $this -> PDO = new \PDO('mysql:host=ec2-3-233-100-43.compute-1.amazonaws.com:5432;dbname=dd741ac9mgmg6b', $username, $password, array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
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
