<?php
class Database {
    private $conn;

    public function __construct($dbConfig) {
        $this->connect($dbConfig);
    }

    private function connect($dbConfig) {
        try {
            if ($dbConfig['type'] === 'sqlite') {
                $this->conn = new PDO("sqlite:" . $dbConfig['path']);
            } elseif ($dbConfig['type'] === 'mysql') {
                $dsn = "mysql:host=" . $dbConfig['host'] . ";dbname=" . $dbConfig['dbname'];
                $this->conn = new PDO($dsn, $dbConfig['username'], $dbConfig['password']);
            }
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}
