<?php


class Database {
    /**
     * @var PDO|null
     */
    private ?PDO $database = null;

    /**
     * @return PDO
     */
    public function getDatabase(): PDO
    {
        if ($this->database) {
            return $this->database;
        }
        return $this->startDatabase(
            "",
            "",
            "",
            "",
        );
    }

    private function startDatabase(string $host, string $user, string $password, string $database) {
        try {
            $this->$database = new PDO("mysql:host=$host;dbname=$database", $user, $password);
        } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
        return $this->$database;
    }
}

$db = new Database();