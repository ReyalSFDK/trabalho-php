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
     * Retorna todos os carros dentro de um pacote
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

        $query = $this->dbConnection->dbc->getPrepare($sql);
        $query->execute([$pacote->getId()]);

        $carros = [];
        foreach ($query as $databaseData) {
            $carros[] = Carro::getDatabasePacote($databaseData);
        }

        return $carros;
    }

    public function createCarro(Carro $carro) {
        $carro_nome = $carro->getNome();
        $carro_marca = $carro->getMarca();
        $carro_imagem = $carro->getImagem();
        $carro_ano = $carro->getAno();
        $carro_tipocarro = $carro->getTipoCarro()->getId();

        $query = $this->dbConnection->dbc->getPrepare("
            INSERT INTO carro (nome, marca, imagem, ano, id_tipo)
            VALUES (?, ?, ?, ?, ?)
        ");

        $query->execute([
            $carro_nome,
            $carro_marca,
            $carro_image,
            $carro_ano,
            $carro_tipocarro
        ]);
    }

    public function updateCarro(Carro $carro) {
        $sql = "
        UPDATE carro SET
            nome = ?,
            marca = ?,
            imagem = ?,
            ano = ?,
            id_tipo = ?

        WHERE
            id = ?
    ";

        $query = $this->dbConnection->dbc->getPrepare($sql);

        $query->execute([
            $carro->getNome(),
            $carro->getMarca(),
            $carro->getImagem(),
            $carro->getAno(),
            $carro->getTipoCarro()->getId(),
            $carro->getId()
        ]);

    }

    public function deleteCarro(Carro $carro) {
        $sql = "
            DELETE FROM carro 
            WHERE id = ?
        ";

        $query = $this->dbConnection->dbc->getPrepare($sql);
        $query->execute([$carro->getId()]);

    }
}
