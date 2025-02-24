<?php
require 'Database.php';
$dbConfig = require 'config.php';
session_start();

// if not admin user, return 401 Unauthorized
if ($_SESSION['username'] !== 'admin') {
    echo json_encode(['code' => 401, 'message' => 'Unauthorized']);
    exit();
}

$db = new Database($dbConfig);
$conn = $db->getConnection();

if ($dbConfig['type'] === 'mysql') {
    // MySQL specific SQL
    $conn->exec("CREATE TABLE IF NOT EXISTS members (
        member_id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        join_date DATE NOT NULL
    )");

    $conn->exec("CREATE TABLE IF NOT EXISTS products (
        product_id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        description TEXT NOT NULL,
        price DECIMAL(10, 2) NOT NULL,
        stock INT NOT NULL
    )");

    $conn->exec("CREATE TABLE IF NOT EXISTS orders (
        order_id INT AUTO_INCREMENT PRIMARY KEY,
        member_id INT NOT NULL,
        product_id INT NOT NULL,
        quantity INT NOT NULL,
        total_price DECIMAL(10, 2) NOT NULL,
        order_date DATE NOT NULL,
        FOREIGN KEY (member_id) REFERENCES members(member_id),
        FOREIGN KEY (product_id) REFERENCES products(product_id)
    )");
} elseif ($dbConfig['type'] === 'sqlite') {
    // SQLite specific SQL
    $conn->exec("CREATE TABLE IF NOT EXISTS members (
        member_id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        email TEXT NOT NULL,
        join_date DATE NOT NULL
    )");

    $conn->exec("CREATE TABLE IF NOT EXISTS products (
        product_id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        description TEXT NOT NULL,
        price REAL NOT NULL,
        stock INTEGER NOT NULL
    )");

    $conn->exec("CREATE TABLE IF NOT EXISTS orders (
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

// Insert sample data for members
$conn->exec("INSERT INTO members (name, email, join_date) VALUES
    ('John Doe', 'john@example.com', '2023-01-01'),
    ('Jane Smith', 'jane@example.com', '2023-02-01'),
    ('Alice Johnson', 'alice@example.com', '2023-03-01')
");

// Insert sample data for products
$conn->exec("INSERT INTO products (name, description, price, stock) VALUES
    ('Product A', 'Description for Product A', 10.00, 100),
    ('Product B', 'Description for Product B', 20.00, 200),
    ('Product C', 'Description for Product C', 30.00, 300)
");

// Insert sample data for orders
$conn->exec("INSERT INTO orders (member_id, product_id, quantity, total_price, order_date) VALUES
    (1, 1, 2, 20.00, '2023-04-01'),
    (2, 2, 1, 20.00, '2023-04-02'),
    (3, 3, 3, 90.00, '2023-04-03')
");

echo json_encode(['message' => 'Sample data inserted successfully']);
