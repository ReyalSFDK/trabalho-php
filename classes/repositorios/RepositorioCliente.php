<?php
// Includes
require_once("RepositorioBase.php");

// Entidades
require_once("classes/entidades/Cliente.php");
require_once("classes/entidades/Carro.php");
require_once("classes/entidades/Pacote.php");

class RepositorioCliente extends RepositorioBase {

    public function createCompra(Cliente $cliente, string $carroPacote) {
        $id_cliente = $cliente->getId();

        $sql = "
            INSERT INTO compra_cliente (id_cliente, id_carro_pacote)
            VALUES (?, ?)
        ";

        $query = $this->dbConnection->getPrepare($sql);
        $query->execute([$id_cliente, $carroPacote]);
    }

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
     * @return Cliente | null
     */
    public function getClienteByCPF(string $cpf) {
        // Faz a consulta no banco e pega todos os clientes
        $sql = "SELECT * FROM cliente WHERE cpf = ?";
        $query = $this->dbConnection->getPrepare($sql);
        $query->bindParam(1, $cpf);

        $result = $query->execute();

        //$result = $this->dbConnection->runQuery($query);

        if ($result) {
            return Cliente::getDatabaseCliente($result);
        }

        return null;
    }

    public function createCliente(Cliente $cliente) {
        
        $cliente_nome = $cliente->getNome();
        $cliente_email = $cliente->getEmail();
        $cliente_cpf = $cliente->getCpf();
        $cliente_telefone = $cliente->getTelefone();

        $sql = "
            INSERT INTO cliente (nome, email, cpf, telefone)
            VALUES (?, ?, ?, ?)
        ";
        $query = $this->dbConnection->getPrepare($sql);
        $query->bindParam(1, $cliente_nome);
        $query->bindParam(2, $cliente_email);
        $query->bindParam(3 ,$cliente_cpf);
        $query->bindParam(4, $cliente_telefone);

        $query->execute();
        //$this->dbConnection->runQuery($query);

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

        $query = $this->dbConnection->getPrepare($sql);
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
        $query = $this->dbConnection->getPrepare($sql);
        $query->bindParam(1, $cliente->getId());
        $query->execute();
        //var_dump($sql);

    }
}


