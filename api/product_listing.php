<?php
require 'Database.php';
$dbConfig = require 'config.php';

// access_token for authentication
$access_token = $_COOKIE['access_token'] ?? '';
if (!$access_token) {
    header('HTTP/1.1 401 Unauthorized');
    echo json_encode(['code' => 401, 'message' => 'Unauthorized']);
    exit;
}

$db = new Database($dbConfig);
$conn = $db->getConnection();

// Validate access_token
$stmt = $conn->prepare("SELECT * FROM access_tokens WHERE token = :token AND expires_at > NOW()");
$stmt->execute([':token' => $access_token]);
$tokenData = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$tokenData) {
    header('HTTP/1.1 401 Unauthorized');
    echo json_encode(['code' => 401, 'message' => 'Unauthorized']);
    exit;
}

$db = new Database($dbConfig);
$conn = $db->getConnection();

// Pagination parameters
$page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, ['options' => ['default' => 1, 'min_range' => 1]]);
$limit = filter_input(INPUT_GET, 'limit', FILTER_VALIDATE_INT, ['options' => ['default' => 10, 'min_range' => 1, 'max_range' => 100]]);
$offset = ($page - 1) * $limit;

// Get total count of products
$total = $db->fetchCount('products');

// Fetch paginated products
$products = $db->fetchAll('products', $limit, $offset);

// Return JSON response
header('Content-Type: application/json');
echo json_encode([
    'page' => $page,
    'limit' => $limit,
    'total' => $total,
    'products' => $products
]);
