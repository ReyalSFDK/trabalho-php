<?
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
        $this->nome = $valor;
        return $this;
    }

    public function getPeriodo(): string {
        return $this->periodo;
    }

    public function setPeriodo(string $periodo): self {
        $this->nome = $periodo;
        return $this;
    }

    static function  getDatabasePacote(object $databaseData): self {
        $pacote = new Pacote();
        $pacote->setNome($databaseData->nome);

        if ($databaseData->id) {
            $this->id = $databaseData->id;
        }

        return $pacote;
    }
}
