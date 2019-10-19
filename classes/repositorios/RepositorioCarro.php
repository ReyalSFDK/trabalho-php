<?
// Includes
require_once("./RepositorioBase.php");

// Entidades
require_once("../entidades/Carro.php");

class RepositorioCarro extends RepositorioBase{

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
            $carros[] = Carro::getDatabaseCarro($databaseData);
        }

        return $carros;
    }
}