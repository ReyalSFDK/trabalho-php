<?php

class TipoCarro {
    /**
     * @var string | null
     */
    private $id = null;

    /**
     * @var string | null
     */
    private $nome;

    public function getId(): ?string {
        return $this->id;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function setNome(string $nome): self {
        $this->nome = $nome;
        return $this;
    }

    public function validate() {
        if (len($this->nome) < 0 || empty($this->nome)) {
            return "O nome não pode ser vazio";
        }
        if (len($this->nome) > 30) {
            return "O nome é mair que 30";
        }

        return null;
    }



    static function  getDatabaseTipoCarro(stdClass $databaseData): self {
        $tipoCarro = new TipoCarro();
        $tipoCarro->setNome($databaseData->nome);

        if ($databaseData->id) {
            $tipoCarro->id = $databaseData->id;
        }

        return $tipoCarro;
    }
}
