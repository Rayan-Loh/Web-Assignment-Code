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

// Pagination parameters
$page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, ['options' => ['default' => 1, 'min_range' => 1]]);
$limit = filter_input(INPUT_GET, 'limit', FILTER_VALIDATE_INT, ['options' => ['default' => 10, 'min_range' => 1, 'max_range' => 100]]);
$offset = ($page - 1) * $limit;

// Get total count of members
$total = $db->fetchCount('members');

// Fetch paginated members
$members = $db->fetchAll('members', $limit, $offset);

// Return JSON response
header('Content-Type: application/json');
echo json_encode([
    'page' => $page,
    'limit' => $limit,
    'total' => $total,
    'members' => $members
]);
