<?
// Includes
require_once("./RepositorioBase.php");

// Entidades
require_once("../entidades/Pacote.php");

class RepositorioCarro extends RepositorioBase{

    /**
     * Retorna todos os tipos de carro do banco
     *
     * @return Pacote[]
     */
    public function selectAllTipoCarro() {
        $sql = "SELECT * FROM pacote";
        $result = $this->dbConnection->getQuery($sql);

        $pacotes = [];
        foreach ($result as $databaseData) {
            $pacotes[] = Pacote::getDatabasePacote($databaseData);
        }

        return $pacotes;
    }
}