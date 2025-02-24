<?php
session_start();

// Initialize cURL session
$ch = curl_init();

// Set the URL
curl_setopt($ch, CURLOPT_URL, 'http://web-assignment-code.local/api/order_listing.php?page=1&limit=10');

// Enable the option to return the response as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Include cookies in the request
curl_setopt($ch, CURLOPT_COOKIE, http_build_query($_COOKIE, '', '; '));

// Execute the cURL request
$response = curl_exec($ch);

// Close the cURL session
curl_close($ch);

// Decode the JSON response
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