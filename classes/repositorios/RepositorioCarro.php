<?php
// Includes
require_once("RepositorioBase.php");

// Entidades
require_once("classes/entidades/Carro.php");
require_once("classes/entidades/Pacote.php");

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
    public function selectAllCarro() {
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

    /**
     * Retorna todos os tipos de carro do banco
     *
     * @return Carro[]
     */
    public function selectAllCarrosInPacote(Pacote $pacote) {
        $sql = "
            SELECT
                carro.*
            FROM
                carro
            INNER JOIN
                carro_pacote
                ON
                    carro_pacote.id_carro = carro.id
            INNER JOIN
                pacote
                ON
                    pacote.id = carro_pacote.id_pacote
            WHERE
                pacote.id = ?
        ";

        $query = $this->dbConnection->dbc->prepare($sql);
        $query->bindParam(1, $pacote->getId());
        $query->execute();
        $query->setFetchMode(PDO::FETCH_OBJ);

        $carros = [];
        foreach ($query as $databaseData) {
            $carros[] = Carro::getDatabasePacote($databaseData);
        }

        return $carros;
    }

    public function createCarro(Carro $carro) {
        $sql = "
        INSERT INTO carro (nome, marca, imagem, id_tipo)
        VALUES (?, ?, ?, ?)
    ";
        $query = $this->dbConnection->dbc->query($sql);
        $query->bindParam(1, $carro->getNome());
        $query->bindParam(2, $carro->getMarca());
        $query->bindParam(3 ,$carro->getImagem());
        $query->bindParam(4, $carro->getTipoCarro()->getId());

        $query->execute();
        $this->dbConnection->runQuery($query);
    }

    public function updateCarro(Carro $carro) {
        $sql = "
        UPDATE carro SET
            nome = ?,
            marca = ?,
            imagem = ?
        WHERE
            id = ?
    ";

        $query = $this->dbConnection->dbc->query($sql);
        $query->bindParam(1,$carro->getNome());
        $query->bindParam(2,$carro->getMarca());
        $query->bindParam(3,$carro->getImagem());
        $query->bindParam(4,$carro->getId());
        $query->execute();
        //var_dump($sql);

    }

    public function deleteCarro(Carro $carro) {
        //print_r($carro);
        $sql = "
        DELETE FROM carro 
        WHERE id = ?

    ";
        $query = $this->dbConnection->dbc->query($sql);
        $query->bindParam(1, $carro->getId());
        $query->execute();
        //var_dump($sql);

    }
}
