<?php
// Includes
require_once("classes/DBConnection.php");

abstract class RepositorioBase {
    public $dbConnection;

    public function __construct(DBConnection $dbConnection) {
        $this->dbConnection = $dbConnection;
    }
}