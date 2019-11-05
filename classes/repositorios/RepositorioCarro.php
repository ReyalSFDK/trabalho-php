<?php

// Includes
require_once("RepositorioBase.php");

// Entidades
require_once("classes/entidades/Carro.php");

class RepositorioCarro extends RepositorioBase {

    /**
     * @var RepositorioTipoCarro
     */
    private $repositorioTipoCarro;

    public function __construct(DBConnection $dbConnection, RepositorioTipoCarro $repositorioTipoCarro) {
        $this->repositorioTipoCarro = $repositorioTipoCarro;
        parent::__construct($dbConnection);
    }

    /**
     * Retorna todos os tipos de carro do banco
     *
     * @return Carro[]
     */
    public function selectAllTipoCarro() {
        $sql = "SELECT * FROM carro";
        $result = $this->dbConnection->getQuery($sql);

        $carros = [];
        foreach ($result as $databaseData) {
            $carro = Carro::getDatabaseCarro($databaseData);
            $carro->setTipoCarro(
                $this->repositorioTipoCarro->selectTipoCarro($result->id_tipo)
            );
            $carros[] = $carro;
        }

        return $carros;
    }
}