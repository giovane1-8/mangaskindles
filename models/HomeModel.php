<?php
    namespace Models;

    class HomeModel extends Model{
        function procurarManga($nome_manga){
            $sql = "SELECT * FROM tb_manga WHERE nm_manga like '%$nome_manga%' limit 10";
            $query = $this -> PDO -> prepare($sql);
            $query -> execute();
            $return = $query -> fetchAll($this -> PDO::FETCH_ASSOC);
            return json_encode($return,JSON_UNESCAPED_UNICODE );
        }   
    }
