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
        $sql = "SELECT * FROM tipo_carro";
        $result = $this->dbConnection->getQuery($sql);

        $tipo_carros = [];
        foreach ($result as $databaseData) {
            $tipo_carros[] = TipoCarro::getDatabaseTipoCarro($databaseData);
        }

        return $tipo_carros;
    }

    public function selectTipoCarro(string $idTipoCarro) {
        $sql = "SELECT * FROM tipo_carro WHERE id = ?";
        $query = $this->dbConnection->dbc->query($sql);
        $query->bindParam(1, $idTipoCarro);
        $query->setFetchMode(PDO::FETCH_OBJ);
        return TipoCarro::getDatabaseTipoCarro($query);
    }
}