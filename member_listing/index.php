<?php
// Fetch data from API
$response = file_get_contents('http://web-assignment-code.local/api/member_listing.php?page=1&limit=10');
$data = json_decode($response, true);

// Check if data is fetched successfully
if ($data && isset($data['members'])) {
    $members = $data['members'];
} else {
    $members = [];
}
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