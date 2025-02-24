<?php
require 'Database.php';
$dbConfig = require 'config.php';

$db = new Database($dbConfig);
$conn = $db->getConnection();

$query = $conn->query("SELECT * FROM orders");
$orders = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Listing</title>
</head>
<body>
<h1>Order Listing</h1>
<table border="1">
    <thead>
    <tr>
        <th>Order ID</th>
        <th>Member ID</th>
        <th>Product ID</th>
        <th>Quantity</th>
        <th>Total Price</th>
        <th>Order Date</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($orders as $order): ?>
        <tr>
            <td><?php echo htmlspecialchars($order['order_id']); ?></td>
            <td><?php echo htmlspecialchars($order['member_id']); ?></td>
            <td><?php echo htmlspecialchars($order['product_id']); ?></td>
            <td><?php echo htmlspecialchars($order['total_price']); ?></td>
            <td><?php echo htmlspecialchars($order['order_date']); ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>