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

// Pagination parameters
$page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, ['options' => ['default' => 1, 'min_range' => 1]]);
$limit = filter_input(INPUT_GET, 'limit', FILTER_VALIDATE_INT, ['options' => ['default' => 10, 'min_range' => 1, 'max_range' => 100]]);
$offset = ($page - 1) * $limit;

// Get total count of members
$totalQuery = $conn->query("SELECT COUNT(*) as total FROM members");
$total = $totalQuery->fetch(PDO::FETCH_ASSOC)['total'];

// Fetch paginated members
$query = $conn->prepare("SELECT * FROM members LIMIT :limit OFFSET :offset");
$query->bindParam(':limit', $limit, PDO::PARAM_INT);
query->bindParam(':offset', $offset, PDO::PARAM_INT);
$query->execute();
$members = $query->fetchAll(PDO::FETCH_ASSOC);

// Return JSON response
header('Content-Type: application/json');
echo json_encode([
    'page' => $page,
    'limit' => $limit,
    'total' => $total,
    'members' => $members
]);
