<?php
/**
 * Teste para verificar se a função que retorna a classe de conexão de banco de dados
 * retorna uma instância unica do banco.
 *
 * Devido a falta de uso do autoload, uma copia da classe Bootstrap foi criada 
 * somente co os dados que precisamos para realizar o teste
 */
require_once("../classes/DBConnection.php");

class DatabaseTest {
    /**
     * Dados de aceso ao banco de dados
     *
     * @var array
     */
    private $configDatabase = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'dbname' => 'fdk_db',
        'username' => 'root',
        'password' => ''
    ];

    /**
     * Variavél da conexão com o banco de dados
     *
     * @var DBConnection
     */
    private $dbConnection;

    /**
     * Função que retorna a instância do banco
     *
     * @return DBConnection
     */
    public function getDatabase(): DBConnection {
        $dbConnection = new DBConnection($this->configDatabase);
        $this->dbConnection = $dbConnection;
        return $this->dbConnection;
    }
}

// Intânciamos a classe
$databaseTest = new DatabaseTest();

// Chamamos duas vezes o metodo para 
$banco1 = $databaseTest->getDatabase();
$banco2 = $databaseTest->getDatabase();

// Aqui comparamos se as intâncias do banco são iguais
$teste = $banco1 === $banco2;
echo "São duas instâncias iguais? ";
if ($teste) {
    echo "Sim";
} else {
    echo "Não";
}

// Printamos na tela a variavel que armazenou o teste
echo "<br>";
echo "<pre>".var_dump($teste)."</pre>";