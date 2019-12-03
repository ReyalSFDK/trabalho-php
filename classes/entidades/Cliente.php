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

    private $cartao;

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

    public function setCartao(string $cartao): self {
        $this->nome = $cartao;
        return $this;
    }

    public function getCartao(): string {
        return $this->cartao;
    }



    public function setTelefone(string $telefone): self {
        $this->nome = $telefone;
        return $this;
    }

    public function validate() {
        if (strlen($this->nome) < 0 || empty($this->nome)) {
            return "O nome não pode ser vazio";
        }
        if (strlen($this->nome) > 20) {
            return "O nome é mair que 20";
        }

        if (strlen($this->cpf != 11) || empty($this->cpf)){
            return "O numero do cpf está incorreto";
        }
        if (strlen($this->telefone != 11 ) || empty($this->telefone)){
            return "Digite um numero de telefone valido";
        }
        if (($this->cartao != "4000000000000010")|| empty($this->cartao)){
            return "O numero do cartão está invalido";
        }


        return null;
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
