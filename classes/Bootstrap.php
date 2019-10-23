<?php
// Includes
require_once("DBConnection.php");
require_once("Core.php");

//// Repositorios
require_once("repositorios/RepositorioTipoCarro.php");

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
        $dbConnection = new DBConnection($this->configDatabase);
        $this->dbConnection = $dbConnection;
        return $this->dbConnection;
    }

    /**
     * Repositorio do tipo de carro
     *
     * @var RepositorioTipoCarro | null 
     */
    private $repositorioTipoCarro = null;

    public function getRepositorioTipoCarro(): RepositorioTipoCarro {
        if ($this->repositorioTipoCarro === null) {
            $this->repositorioTipoCarro = new RepositorioTipoCarro($this->getDatabase());
        }
        return $this->repositorioTipoCarro; 
    }

    public function getCore() {
        return Core::getInstance();
    }
}

$bootstrap = new Bootstrap();