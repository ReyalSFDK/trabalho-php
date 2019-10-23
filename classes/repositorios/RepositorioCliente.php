<?
// Includes
require_once("./RepositorioBase.php");

// Entidades
require_once("../entidades/Cliente.php");

class RepositorioCarro extends RepositorioBase{

    /**
     * Retorna todos os tipos de carro do banco
     *
     * @return Cliente[]
     */
    public function selectAllTipoCarro() {
        $sql = "SELECT * FROM cliente";
        $result = $this->dbConnection->getQuery($sql);

        $clientes = [];
        foreach ($result as $databaseData) {
            $clientes[] = Cliente::getDatabaseCarro($databaseData);
        }

        return $clientes;
    }
}