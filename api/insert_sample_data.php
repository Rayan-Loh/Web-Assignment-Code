<?php
require 'Database.php';
$dbConfig = require 'config.php';

// access_token for authentication
$access_token = filter_input(INPUT_GET, 'access_token');
if ($access_token !== 'mock:your_secret_key') {
    header('HTTP/1.1 401 Unauthorized');
    echo json_encode(['code' => 401, 'message' => 'Unauthorized']);
    exit;
}

$db = new Database($dbConfig);
$conn = $db->getConnection();

// Create tables if not exists
$db->createTables();
$db->createAccessTokenTable();

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
