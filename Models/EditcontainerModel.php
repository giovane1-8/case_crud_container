<?php
/*
 * Classe Model da pagina home
*/

namespace Models;

class EditcontainerModel extends Model
{
    public function getContainerR($container)
    {

        $smtm = $this->PDO->prepare("SELECT * FROM tb_container WHERE cd_container = '" . $container . "'");
        if ($smtm->execute()) {
            return $smtm->fetchAll();
        }
        return [];
    }
    public function saveedit($dados)
    {

        $dados["cn1"] = $dados["cn1"] . $dados["cn2"];

        $sql = "UPDATE tb_container SET cd_container = '" . $dados["cn1"] . "',cd_tipo= '" . $dados["tipo"] . "',nm_status='" . $dados["status"] . "' ,nm_categoria= '" . $dados["categoria"] . "'
        WHERE cd_container = '" . $dados["container"] . "'";
        $smtm = $this->PDO->prepare($sql);

        if ($smtm->execute()) {
            return true;
        } else {
            return false;
        }
    }
    function excluirContainer($container)
    {
        $sql = "DELETE FROM tb_container WHERE cd_container = '" . $container . "'";
        
        $smtm = $this->PDO->prepare($sql);

        if ($smtm->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
