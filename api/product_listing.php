<?php
require 'Database.php';
$dbConfig = require 'config.php';

$db = new Database($dbConfig);
$conn = $db->getConnection();

// Pagination parameters
$page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, ['options' => ['default' => 1, 'min_range' => 1]]);
$limit = filter_input(INPUT_GET, 'limit', FILTER_VALIDATE_INT, ['options' => ['default' => 10, 'min_range' => 1, 'max_range' => 100]]);
$offset = ($page - 1) * $limit;

// Get total count of products
$totalQuery = $conn->query("SELECT COUNT(*) as total FROM products");
$total = $totalQuery->fetch(PDO::FETCH_ASSOC)['total'];

// Fetch paginated products
$query = $conn->prepare("SELECT * FROM products LIMIT :limit OFFSET :offset");
$query->bindParam(':limit', $limit, PDO::PARAM_INT);
$query->bindParam(':offset', $offset, PDO::PARAM_INT);
$query->execute();
$products = $query->fetchAll(PDO::FETCH_ASSOC);

// Return JSON response
header('Content-Type: application/json');
echo json_encode([
    'page' => $page,
    'limit' => $limit,
    'total' => $total,
    'products' => $products
]);
