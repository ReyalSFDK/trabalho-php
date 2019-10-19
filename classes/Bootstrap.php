<?
// Includes
require_once("./DBConnection.php");
require_once("./Core.php");

//// Repositorios
require_once("./repositorios/RepositorioTipoCarro.php");

class Bootstrap {
    private $configDatabase = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'dbname' => 'fdk_db',
        'username' => 'root',
        'password' => ''
    ];

    /*
     * @var DBConnection
     */
    private $dbConnection;

    // Boot
    public function __construct() {
        $this->getDatabase();
    }

    private function getDatabase(): DBConnection {
        $this->dbConnection = new DBConnection($this->configDatabase);        
        return $this->dbConnection->get;
    }

    /**
     * Repositorio do tipo de carro
     *
     * @var RepositorioTipoCarro | null 
     */
    private $repositorioTipoCarro = null;

    public function getRepositorioTipoCarro(): RepositorioTipoCarro {
        if (!$this->repositorioTipoCarro) {
            $this->repositorioTipoCarro = new RepositorioTipoCarro($this->getDatabase());;
        }
        return $this->repositorioTipoCarro; 
    }

    public function getCore() {
        return Core::getInstance();
    }
}

$bootstrap = new Bootstrap();