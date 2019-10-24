<?
class Cliente {
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
    private $email = null;

    /**
     * @var string | null
     */
    private $cpf;

    /**
     * @var string | null
     */
    private $telefone;

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

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): self {
        $this->nome = $email;
        return $this;
    }

    public function getCpf(): string {
        return $this->cpf;
    }

    public function setCpf(string $cpf): self {
        $this->nome = $cpf;
        return $this;
    }

    public function getTelefone(): string {
        return $this->telefone;
    }

    public function setTelefone(string $telefone): self {
        $this->nome = $telefone;
        return $this;
    }
    static function  getDatabaseCliente(stdClass $databaseData): self {
        $cliente = new Cliente();
        $cliente->setNome($databaseData->nome);

        if ($databaseData->id) {
            $cliente->id = $databaseData->id;
        }

        return $cliente;
    }
}
