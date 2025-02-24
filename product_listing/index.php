<?php
session_start();
// Fetch data from API
$response = file_get_contents('http://web-assignment-code.local/api/product_listing.php?page=1&limit=10&access_token=mock:your_secret_key');
$data = json_decode($response, true);

// Check if data is fetched successfully
if ($data && isset($data['products'])) {
    $products = $data['products'];
} else {
    $products = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Listing</title>
</head>
<body>
<h1>Product Listing</h1>
<table border="1">
    <thead>
    <tr>
        <th>Product ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Stock</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $product): ?>
        <tr>
            <td><?php echo htmlspecialchars($product['name']); ?></td>
            <td><?php echo htmlspecialchars($product['description']); ?></td>
            <td><?php echo htmlspecialchars($product['price']); ?></td>
            <td><?php echo htmlspecialchars($product['stock']); ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>