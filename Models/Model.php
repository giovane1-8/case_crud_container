<?php
/*
 * Classe filha de todas as Models
 * aqui fica os metodos e propriedades que usamos em todas as Model
 * aqui fica a conexão com o servidor de banco de dados
 * MODIFICAR VARIAVEIS: $username, $password, $servidor PARA CONEXAO COM O SERVIODR 
*/

namespace Models;


class Model
{
    protected object $PDO;
    protected $username, $password, $servidor, $port, $banco, $caminhoMysql;
    function __construct()
    {
        $this->banco = "db_container";

        //VARIAVEIS DE CONFIGURAÇÃO DO BANCO
        $this->username = "root";
        $this->password = "";
        $this->servidor = "localhost";
        $this->port = "3306";

        try {
            $this->PDO = new \PDO('mysql:host=' . $this->servidor . ':' . $this->port . ';dbname=' . $this->banco . '', $this->username, $this->password, array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $this->PDO->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
        }
    }
    function getAllContainers()
    {
        $stmt = $this->PDO->query("SELECT * FROM tb_container INNER JOIN tb_cliente on tb_cliente.id_cliente = tb_container.id_cliente ");
        return $stmt->fetchAll();
    }
    public function getContainer($container)
    {

        $smtm = $this->PDO->prepare("SELECT * FROM tb_container WHERE cd_container = '" . $container . "'");
        if ($smtm->execute()) {
            echo json_encode($smtm->fetchAll());
        } else {
            echo [];
        }
    }
}
