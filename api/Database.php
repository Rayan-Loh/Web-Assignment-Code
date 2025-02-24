<?php
class Database {
    private $conn;
    private $type;

    public function __construct($config) {
        $this->type = $config['type'];
        if ($this->type === 'mysql') {
            $dsn = "mysql:host={$config['host']};dbname={$config['dbname']}";
            $this->conn = new PDO($dsn, $config['username'], $config['password']);
        } elseif ($this->type === 'sqlite') {
            $dsn = "sqlite:{$config['path']}";
            $this->conn = new PDO($dsn);
        }
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getConnection() {
        return $this->conn;
    }

    public function createTables() {
        if ($this->type === 'mysql') {
            $this->conn->exec("CREATE TABLE IF NOT EXISTS members (
                member_id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                email VARCHAR(255) NOT NULL,
                join_date DATE NOT NULL
            )");

            $this->conn->exec("CREATE TABLE IF NOT EXISTS products (
                product_id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                description TEXT NOT NULL,
                price DECIMAL(10, 2) NOT NULL,
                stock INT NOT NULL
            )");

            $this->conn->exec("CREATE TABLE IF NOT EXISTS orders (
                order_id INT AUTO_INCREMENT PRIMARY KEY,
                member_id INT NOT NULL,
                product_id INT NOT NULL,
                quantity INT NOT NULL,
                total_price DECIMAL(10, 2) NOT NULL,
                order_date DATE NOT NULL,
                FOREIGN KEY (member_id) REFERENCES members(member_id),
                FOREIGN KEY (product_id) REFERENCES products(product_id)
            )");
        } elseif ($this->type === 'sqlite') {
            $this->conn->exec("CREATE TABLE IF NOT EXISTS members (
                member_id INTEGER PRIMARY KEY AUTOINCREMENT,
                name TEXT NOT NULL,
                email TEXT NOT NULL,
                join_date DATE NOT NULL
            )");

            $this->conn->exec("CREATE TABLE IF NOT EXISTS products (
                product_id INTEGER PRIMARY KEY AUTOINCREMENT,
                name TEXT NOT NULL,
                description TEXT NOT NULL,
                price REAL NOT NULL,
                stock INTEGER NOT NULL
            )");

            $this->conn->exec("CREATE TABLE IF NOT EXISTS orders (
                order_id INTEGER PRIMARY KEY AUTOINCREMENT,
                member_id INTEGER NOT NULL,
                product_id INTEGER NOT NULL,
                quantity INTEGER NOT NULL,
                total_price REAL NOT NULL,
                order_date DATE NOT NULL,
                FOREIGN KEY (member_id) REFERENCES members(member_id),
                FOREIGN KEY (product_id) REFERENCES products(product_id)
            )");
        }
    }

    public function fetchAll($table, $limit, $offset) {
        $query = $this->conn->prepare("SELECT * FROM $table LIMIT :limit OFFSET :offset");
        $query->bindParam(':limit', $limit, PDO::PARAM_INT);
        $query->bindParam(':offset', $offset, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchCount($table) {
        $query = $this->conn->query("SELECT COUNT(*) as total FROM $table");
        return $query->fetch(PDO::FETCH_ASSOC)['total'];
    }
}
