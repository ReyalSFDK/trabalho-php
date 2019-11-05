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
                ?,
                ?,
                ?,
                1
            )
        ";
        $query = $this->dbConnection->dbc->query($sql); 
        $query->bindParam(
        1,$pacote->getNome(), 
        2,$pacote->getValor(), 
        3,$pacote->getPeriodo(),
        );
        $query->execute();
        $this->dbConnection->runQuery($query);
    }

    public function updatePacote(Pacote $pacote) {
        //print_r($pacote);
        $sql = "
            UPDATE pacote
            SET nome = ?,
            valor = ?,
            periodo = ?,
            WHERE id = ?
            
        ";
        $query = $this->dbConnection->dbc->query($sql); 
        $query->bindParam(
        1,$pacote->getNome(), 
        2,$pacote->getValor(), 
        3,$pacote->getPeriodo(),
        4,$pacote->getId()
        );
        $query->execute();
        //var_dump($sql);
        
    }

    public function deletePacote(Pacote $pacote) {
        //print_r($pacote);
        $sql = "
            DELETE FROM pacote 
            WHERE id = ?
    
        ";
        $query = $this->dbConnection->dbc->query($sql); 
        $query->bindParam(1, $pacote->getId());
        $query->execute();
        //var_dump($sql);
        
    }
}
