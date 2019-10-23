<?
// Includes
require_once("../DBConnection.php");

abstract class RepositorioBase {
    protected $dbConnection;

    public function __constructor(DBConnection $dbConnection) {
        $this->dbConnection = $dbConnection;
    }
}