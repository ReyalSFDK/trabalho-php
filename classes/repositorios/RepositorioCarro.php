<?php
// Includes
require_once("RepositorioBase.php");

// Entidades
require_once("classes/entidades/Carro.php");

class RepositorioCarro extends RepositorioBase {


        /**
         * Retorna todos os tipos de carro do banco
         *
         * @return Carro[]
         */
        public function selectAllCarro() {
            // Faz a consulta no banco e pega o pacote com suas relações
            $sql = "SELECT * FROM carro ";
            $result = $this->dbConnection->getQuery($sql);

            $carros = [];
            foreach ($result as $databaseData) {
                $carros[] = Carro::getDatabaseCarrp($databaseData);
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
            $query->bindParam(4, 1);

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
            $query->bindParam(1,$pacote->getNome());
            $query->bindParam(2,$pacote->getMarca());
            $query->bindParam(3,$pacote->getImagem());
            $query->bindParam(4,$pacote->getId());
            $query->execute();
            //var_dump($sql);

        }

        public function deleteCarro(Carro $carro) {
            //print_r($pacote);
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
