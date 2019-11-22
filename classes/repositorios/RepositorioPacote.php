<?php
// Includes
require_once("RepositorioBase.php");

// Entidades
require_once("classes/entidades/Pacote.php");

class RepositorioPacote extends RepositorioBase {

    /**
     * Retorna todos os tipos de carro do banco
     *
     * @return Pacote[]
     */
    public function selectAllPacote() {
        // Faz a consulta no banco e pega o pacote com suas relações
        $sql = "SELECT * FROM pacote";
        $result = $this->dbConnection->getQuery($sql);

        $pacotes = [];
        foreach ($result as $databaseData) {
            $pacotes[] = Pacote::getDatabasePacote($databaseData);
        }

        return $pacotes;
    }

    public function selectPacote($id) {
        $sql = "SELECT * FROM pacote WHERE id = ?";
        $query = $this->dbConnection->getQuery($sql);

        $query->bindParam(1, $id);
        
        $result = $this->dbConnection->runQuery($query);

        $pacote = Pacote::getDatabasePacote($result);

        return $pacote;
    }

    public function createPacote(Pacote $pacote) {
        
        $pacote_nome = $pacote->getNome();
        $pacote_valor = $pacote->getValor();
        $pacote_periodo = $pacote->getPeriodo();
        $query = $this->dbConnection->dbc->prepare("
            INSERT INTO pacote (nome, valor, periodo)
            VALUES (?, ?, ?)
        ");
        //$query = $this->dbConnection->dbc->query($sql);
        $query->bindParam(1, $pacote_nome);
        $query->bindParam(2, $pacote_valor);
        $query->bindParam(3 ,$pacote_periodo);
        //$query->bindParam(4, 1);

        $query->execute();
        //$this->dbConnection->runQuery($query);

    }

    public function updatePacote(Pacote $pacote) {
        $sql = "
            UPDATE pacote SET
                nome = ?,
                valor = ?,
                periodo = ?
            WHERE
                id = ?
        ";

        $query = $this->dbConnection->dbc->query($sql);
        $query->bindParam(1,$pacote->getNome());
        $query->bindParam(2,$pacote->getValor());
        $query->bindParam(3,$pacote->getPeriodo());
        $query->bindParam(4,$pacote->getId());
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
