<?php

class Carro {

    /**
     * @var string | null
     */
    private $id = null;

    /**
     * @var string
     */
    private $nome;

    /**
     * @var string
     */
    private $marca;

    /**
     * @var string
     */
    private $imagem;

    /**
     * @var TipoCarro
     */
    private $tipoCarro;

    public function getId(): ?string {

        return $this->id;
    }

    public function getNome(): string {

        return $this->nome;
    }

    /**
     * @return string
     */
    public function getMarca(): string
    {
        return $this->marca;
    }

    /**
     * @param string $marca
     * @return Carro
     */
    public function setMarca(string $marca): Carro
    {
        $this->marca = $marca;
        return $this;
    }

    /**
     * @return string
     */
    public function getImagem(): string
    {
        return $this->imagem;
    }

    /**
     * @param string $imagem
     * @return Carro
     */
    public function setImagem(string $imagem): Carro
    {
        $this->imagem = $imagem;
        return $this;
    }

    /**
     * @return TipoCarro
     */
    public function getTipoCarro(): TipoCarro
    {
        return $this->tipoCarro;
    }

    /**
     * @param TipoCarro $tipoCarro
     * @return Carro
     */
    public function setTipoCarro(TipoCarro $tipoCarro): Carro
    {
        $this->tipoCarro = $tipoCarro;
        return $this;
    }

    static function getDatabaseCarro(stdClass $databaseData): self {
        $carro = new Carro();
        $carro->setNome($databaseData->nome);

        if ($databaseData->id) {
            $carro->id = $databaseData->id;
        }

        return $carro;
    }
}