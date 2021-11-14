<?php
    namespace Models;

    class LoginModel extends Model{
        private $resultado;

        function getResultado(): bool{
            return $this->resultado;
        }

        public function validarLogin(array $dados = null){
            
            $query = "SELECT * FROM tb_usuario WHERE (nm_email = :email OR nm_nickname = :email) AND nm_senha = :senha LIMIT 1";
            $result = $this -> PDO ->prepare($query);
            $result -> bindParam(':email', $dados['usuario'], \PDO::PARAM_STR);
            $result -> bindParam(':senha', $dados['senha'], \PDO::PARAM_STR);
            $result -> execute();
            $return = $result -> fetch();
            
            if(!empty($return)){
                $_SESSION['isLogado'] = true;
                $_SESSION['id_usuario'] = $return['id_usuario'];
                $_SESSION['nm_usuario'] = $return['nm_usuario'];
                $_SESSION['nm_senha'] = $return['nm_senha'];
                $_SESSION['nm_email'] = $return['nm_email'];
                $_SESSION['nm_nickname'] = $return['nm_nickname'];
                $_SESSION['nm_cor_favorita'] = $return['nm_cor_favorita'];
                $_SESSION['nm_caminho_foto'] = (empty($return['nm_caminho_foto'])) ? "recursos/img/fotos_usuarios/default.png" : $return['nm_caminho_foto'];
                $this -> resultado = true;
            }else{ 
                $_SESSION['isLogado'] = false;
                $this -> resultado = false;
            }
        }
    }
