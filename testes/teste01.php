<?php

require_once("../classes/DBConnection.php");

class DatabaseTest {
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

    public function getDatabase(): DBConnection {
        $dbConnection = new DBConnection($this->configDatabase);
        $this->dbConnection = $dbConnection;
        return $this->dbConnection;
    }
}

$databaseTest = new DatabaseTest();

$banco1 = $databaseTest->getDatabase();
$banco2 = $databaseTest->getDatabase();

$teste = $banco1 === $banco2;
echo "São duas instâncias iguais? ";
if ($teste) {
    echo "Sim";
} else {
    echo "Não";
}

echo "<br>";
echo "<pre>".var_dump($teste)."</pre>";