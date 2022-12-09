<?php

namespace Models;

class AddcontainerModel extends Model
{
    public function insereDb($dados)
    {
        $dados["cn1"] = $dados["cn1"] . $dados["cn2"];

        $sql = "INSERT INTO tb_container (id_cliente,cd_container,cd_tipo,nm_status ,nm_categoria) 
        VALUES (?,?,?,?,?)";
        $smtm = $this->PDO->prepare($sql);
        $smtm->bindParam(1, $dados["cliente"], \PDO::PARAM_STR);
        $smtm->bindParam(2, $dados["cn1"], \PDO::PARAM_STR);
        $smtm->bindParam(3, $dados["tipo"], \PDO::PARAM_STR);
        $smtm->bindParam(4, $dados["status"], \PDO::PARAM_STR);
        $smtm->bindParam(5, $dados["categoria"], \PDO::PARAM_STR);

        if ($smtm->execute()) {
            return true;
        } else {
            return false;
        }
    }
    function getClientes()
    {
        $stmt = $this->PDO->query("SELECT * FROM tb_cliente");
        return $stmt->fetchAll();
    }
}
