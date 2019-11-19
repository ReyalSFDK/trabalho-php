<?php
class Pacote {
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
    private $valor = null;

    /**
     * @var string | null
     */
    private $periodo;

    /**
     * @var Carro[
     */
    private $carros;

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

    public function getValor(): string {
        return $this->valor;
    }

    public function setValor(string $valor): self {
        $this->valor = $valor;
        return $this;
    }

    public function getPeriodo(): string {
        return $this->periodo;
    }

    public function setPeriodo(string $periodo): self {
        $this->periodo = $periodo;
        return $this;
    }

    public function addCarro(Carro $carro): self {
        $this->carros[] = $carro;

        return $this;
    }

    public function getCarros(): Carro {
        return $this->carros;
    }

    static function  getDatabasePacote(stdClass $databaseData): self {
        $pacote = new Pacote();
        $pacote->setNome($databaseData->nome);
        $pacote->setValor($databaseData->valor);
        $pacote->setPeriodo($databaseData->periodo);

        if ($databaseData->id) {
            $pacote->id = $databaseData->id;
        }

        return $pacote;
    }
}
