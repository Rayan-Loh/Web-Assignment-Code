<?php
session_start();
// Fetch data from API
$response = file_get_contents('http://web-assignment-code.local/api/order_listing.php?page=1&limit=10&access_token=mock:your_secret_key');
$data = json_decode($response, true);

// Check if data is fetched successfully
if ($data && isset($data['orders'])) {
    $orders = $data['orders'];
} else {
    $orders = [];
}
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
            <td><?php echo htmlspecialchars($order['quantity']); ?></td>
            <td><?php echo htmlspecialchars($order['total_price']); ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>