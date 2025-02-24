<?php
require '../_base.php';
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: /login');
    exit;
}

// Fetch purchase history from the database
// Replace with actual database connection and query
$purchase_history = [
    ['date' => '2023-01-01', 'item' => 'Item 1', 'amount' => '$10.00'],
    ['date' => '2023-02-01', 'item' => 'Item 2', 'amount' => '$20.00'],
    // Add more items as needed
];

?>
<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<?php include '_head.php'; ?>
<head>
    <link rel="stylesheet" href="../css/purchase_history_style.css">
</head>
<body>
<header>
    <!-- Include your header content here -->
</header>
<main>
    <h1>Purchase History</h1>
    <table>
        <thead>
        <tr>
            <th>Date</th>
            <th>Item</th>
            <th>Amount</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($purchase_history as $purchase): ?>
            <tr>
                <td><?php echo htmlspecialchars($purchase['date']); ?></td>
                <td><?php echo htmlspecialchars($purchase['item']); ?></td>
                <td><?php echo htmlspecialchars($purchase['amount']); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</main>
<footer>
    <!-- Include your footer content here -->
</footer>
</body>
</html>