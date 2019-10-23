<?php

class Carro{

    /**
     * @var string | null
     */

    private $id = null;

    /**
     * @var string | null
     */

    private $nome;

    /**
     * @var string | null
     */

    private $id_tipo;

    public function getId(): ?string {

        return $this->id;
    }
    
    public function getNome(): string {

        return $this->nome;
    }
    
    public function getIdTipo(): string {

        return $this->id_tipo;
    }

    static function  getDatabaseCarro(object $databaseData): self {
        $carro = new Carro();
        $carro->setNome($databaseData->nome);

        if ($databaseData->id) {
            $carro->id = $databaseData->id;
        }

        return $carro;
    }
}