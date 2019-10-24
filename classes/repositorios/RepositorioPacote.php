<?php
// Includes
require_once("RepositorioBase.php");

// Entidades
require_once("classes/entidades/Pacote.php");

class RepositorioPacote extends RepositorioBase{

    /**
     * Retorna todos os tipos de carro do banco
     *
     * @return Pacote[]
     */
    public function selectAllPacote() {
        // Faz a consulta no banco e pega o pacote com suas relações
        $sql = "
            SELECT
                p.id as id,
                p.nome as nome,
                p.valor as valor,
                p.periodo as periodo,
                tp.id as tipoCarro_id,
                tp.nome as tipoCarro_nome               
            FROM pacote AS p 
            INNER JOIN tipo_carro AS tp 
            WHERE p.id_tipo = tp.id
        ";
        $result = $this->dbConnection->getQuery($sql);

        $pacotes = [];
        foreach ($result as $databaseData) {
            $pacotes[] = Pacote::getDatabasePacote($databaseData);
        }

        return $pacotes;
    }

    public function createPacote(Pacote $pacote) {
        print_r($pacote);
        $sql = "
            INSERT INTO pacote (nome, valor, periodo, id_tipo)
            VALUES (
                `{$pacote->getNome()}`,
                `{$pacote->getValor()}`,
                `{$pacote->getPeriodo()}`,
                1
            )
        ";
        var_dump($sql);
        $this->dbConnection->runQuery($sql);
    }
}