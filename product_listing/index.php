<?php
session_start();

// Initialize cURL session
$ch = curl_init();

// Set the URL
curl_setopt($ch, CURLOPT_URL, 'http://web-assignment-code.local/api/product_listing.php?page=1&limit=10');

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