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
        $result = $this->dbConnection->getPrepare($sql);
        $result->setFetchMode(PDO::FETCH_OBJ);
        $result->execute();
        $tipo_carro = [];
        foreach ($result as $databaseData) {
            $tipo_carro[] = TipoCarro::getDatabaseTipoCarro($databaseData);
        }

        return $tipo_carro;
    }

    public function selectTipoCarro($id) {

        $query = $this->dbConnection->getPrepare("SELECT * FROM tipo_carro WHERE id=?");
        //$query = $this->dbConnection->getPrepare($sql);
        $query->execute([$id]);
        $tipo_carro = $query->fetch();

//        $result = $this->dbConnection->runQuery($query);
        ///var_dump($tipo_carro);


        return TipoCarro::getDatabaseTipoCarro($tipo_carro);
    }

    public function createTipoCarro(TipoCarro $tipo_carro) {

        $tipo_nome = $tipo_carro->getNome();
        $sql = "
            INSERT INTO tipo_carro (nome)
            VALUES (?)
        ";
        $query = $this->dbConnection->getPrepare($sql);
        $query->bindParam(1,$tipo_nome );


        $query->execute();
        //$this->dbConnection->runQuery($query);
    }

    public function updateTipoCarro(TipoCarro $tipo_carro) {
        $tipo_carro_nome = $tipo_carro->getNome();
        $tipo_carro_id = $tipo_carro->getId();
        $sql = "
            UPDATE tipo_carro SET
                nome = ?
            WHERE
                id = ?
        ";

        $query = $this->dbConnection->getPrepare($sql);
        $query->bindParam(1,$tipo_carro_nome);
        $query->bindParam(2,$tipo_carro_id);
        $query->execute();
        //var_dump($sql);

    }

    public function deleteTipoCarro(TipoCarro $tipo_carro) {

        $sql = "
            DELETE FROM tipo_carro 
            WHERE id = ?
    
        ";
        $query = $this->dbConnection->getPrepare($sql);
        $query->bindParam(1, $tipo_carro->getId());
        $query->execute();
        //var_dump($sql);

    }
}

