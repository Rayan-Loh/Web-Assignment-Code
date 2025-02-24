<?php
require 'Database.php';
$dbConfig = require 'config.php';

$db = new Database($dbConfig);
$conn = $db->getConnection();

// Create members table if it doesn't exist
$conn->exec("CREATE TABLE IF NOT EXISTS members (
    member_id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    email TEXT NOT NULL,
    join_date DATE NOT NULL
)");

// Create products table if it doesn't exist
$conn->exec("CREATE TABLE IF NOT EXISTS products (
    product_id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    description TEXT NOT NULL,
    price REAL NOT NULL,
    stock INTEGER NOT NULL
)");

// Create orders table if it doesn't exist
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

// Insert sample data for members
$conn->exec("INSERT INTO members (member_id, name, email, join_date) VALUES
    (1, 'John Doe', 'john@example.com', '2023-01-01'),
    (2, 'Jane Smith', 'jane@example.com', '2023-02-01'),
    (3, 'Alice Johnson', 'alice@example.com', '2023-03-01')
");

// Insert sample data for products
$conn->exec("INSERT INTO products (product_id, name, description, price, stock) VALUES
    (1, 'Product A', 'Description for Product A', 10.00, 100),
    (2, 'Product B', 'Description for Product B', 20.00, 200),
    (3, 'Product C', 'Description for Product C', 30.00, 300)
");

// Insert sample data for orders
$conn->exec("INSERT INTO orders (order_id, member_id, product_id, quantity, total_price, order_date) VALUES
    (1, 1, 1, 2, 20.00, '2023-04-01'),
    (2, 2, 2, 1, 20.00, '2023-04-02'),
    (3, 3, 3, 3, 90.00, '2023-04-03')
");

echo "Sample data inserted successfully.";
