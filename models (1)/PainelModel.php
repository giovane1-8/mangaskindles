<?php

namespace Models;

class PainelModel extends Model{
    function addFotoPerfil($caminho_foto)
    {
        $sql = "UPDATE tb_usuario SET nm_caminho_foto = :caminho_foto WHERE id_usuario = :usuario_id ";
        $smtm = $this->PDO->prepare($sql);
        $smtm->bindParam(":caminho_foto", $caminho_foto);
        $smtm->bindParam(":usuario_id", $_SESSION['id_usuario']);
        if ($smtm->execute()) {
            return true;
        }
    }
    function removerCaminhoFoto()
    {
        $sql = "UPDATE tb_usuario SET nm_caminho_foto = Null WHERE id_usuario = :usuario_id ";
        $smtm = $this->PDO->prepare($sql);
        $smtm->bindParam(":usuario_id", $_SESSION['id_usuario']);
        if ($smtm->execute()) {
            return true;
        }
    }
}
