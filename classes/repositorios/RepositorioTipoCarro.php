<?php
// Includes
require_once("RepositorioBase.php");

// Entidades
require_once("classes/entidades/TipoCarro.php");

class RepositorioTipoCarro extends RepositorioBase {

    /**
     * Retorna todos os tipos de carro do banco
     *
     * @return TipoCarro[]
     */
    public function selectAllTipoCarro() {
        // Faz a consulta no banco e pega o todos os tipos de carro
        $sql = "SELECT * FROM tipo_carro";
        $result = $this->dbConnection->getQuery($sql);

        $tipo_carro = [];
        foreach ($result as $databaseData) {
            $tipo_carro[] = TipoCarro::getDatabaseTipoCarro($databaseData);
        }

        return $tipo_carro;
    }

    public function createTipoCarro(TipoCarro $tipo_carro) {
        $sql = "
            INSERT INTO tipo_carro (nome)
            VALUES (?)
        ";
        $query = $this->dbConnection->dbc->query($sql);
        $query->bindParam(1, $tipo_carro->getNome());


        $query->execute();
        $this->dbConnection->runQuery($query);
    }

    public function updateTipoCarro(TipoCarro $tipo_carro) {
        $sql = "
            UPDATE tipo_carro SET
                nome = ?
            WHERE
                id = ?
        ";

        $query = $this->dbConnection->dbc->query($sql);
        $query->bindParam(1,$tipo_carro->getNome());
        $query->execute();
        //var_dump($sql);

    }

    public function deleteTipoCarro(TipoCarro $tipo_carro) {

        $sql = "
            DELETE FROM tipo_carro 
            WHERE id = ?
    
        ";
        $query = $this->dbConnection->dbc->query($sql);
        $query->bindParam(1, $tipo_carro->getId());
        $query->execute();
        //var_dump($sql);

    }
}

