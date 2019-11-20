<?php
// Includes
require_once("RepositorioBase.php");

// Entidades
require_once("classes/entidades/Cliente.php");

class RepositorioCliente extends RepositorioBase {

    /**
     * Retorna todos os tipos de carro do banco
     *
     * @return Cliente[]
     */
    public function selectAllCliente() {
        // Faz a consulta no banco e pega todos os clientes
        $sql = "SELECT * FROM cliente";
        $result = $this->dbConnection->getQuery($sql);

        $clientes = [];
        foreach ($result as $databaseData) {
            $clientes[] = Cliente::getDatabaseCliente($databaseData);
        }

        return $clientes;
    }

    /**
     * Retorna todos os tipos de carro do banco
     *
     * @return Cliente[]
     */
    public function getClienteByCPF(string $cpf) {
        // Faz a consulta no banco e pega todos os clientes
        $sql = "SELECT COUNT(*) FROM cliente WHERE cpf = ?";
        $query = $this->dbConnection->dbc->query($sql);
        $query->bindParam(1, $cpf);


        return $clientes;
    }

    public function createCliente(Cliente $cliente) {
        $sql = "
            INSERT INTO cliente (nome, email, cpf, telefone)
            VALUES (?, ?, ?, ?)
        ";
        $query = $this->dbConnection->dbc->query($sql);
        $query->bindParam(1, $cliente->getNome());
        $query->bindParam(2, $cliente->getEmail());
        $query->bindParam(3 ,$cliente->getCpf());
        $query->bindParam(4, $cliente->getTelefone());

        $query->execute();
        $this->dbConnection->runQuery($query);
    }

    public function updateCliente(Cliente $cliente) {
        $sql = "
            UPDATE cliente SET
                nome = ?,
                email = ?,
                cpf = ?,
                telefone = ?

            WHERE
                id = ?
        ";

        $query = $this->dbConnection->dbc->query($sql);
        $query->bindParam(1,$cliente->getNome());
        $query->bindParam(2,$cliente->getEmail());
        $query->bindParam(3,$cliente->getCpf());
        $query->bindParam(4,$cliente->getTelefone());
        $query->execute();
        //var_dump($sql);

    }

    public function deleteCliente(Cliente $cliente) {
        //print_r($cliente);
        $sql = "
            DELETE FROM cliente 
            WHERE id = ?
    
        ";
        $query = $this->dbConnection->dbc->query($sql);
        $query->bindParam(1, $cliente->getId());
        $query->execute();
        //var_dump($sql);

    }
}


