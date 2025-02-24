<?php
require 'Database.php';
$dbConfig = require 'config.php';

$db = new Database($dbConfig);
$conn = $db->getConnection();

$query = $conn->query("SELECT * FROM members");
$members = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Member Listing</title>
</head>
<body>
<h1>Member Listing</h1>
<table border="1">
    <thead>
    <tr>
        <th>Member ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Join Date</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($members as $member): ?>
        <tr>
            <td><?php echo htmlspecialchars($member['member_id']); ?></td>
            <td><?php echo htmlspecialchars($member['name']); ?></td>
            <td><?php echo htmlspecialchars($member['email']); ?></td>
            <td><?php echo htmlspecialchars($member['join_date']); ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>