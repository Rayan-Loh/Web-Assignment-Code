<?php
require '../_base.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Replace with actual user validation logic
    // Example: Retrieve the hashed password from the database
    // $hashed_password = ...

    // mock
    $hashed_password = '$2y$10$skncwUwal.B77BO47/879e5Luh3UuDdPjxgwFVFT41o2eyJSY3hzm';
    if ($username === "admin" && password_verify($password, $hashed_password)) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header('Location: ../index.php');
        exit;
    } else {
        $error = 'Invalid username or password';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<form id="loginForm" method="POST" action="/login/index.php" class="login-form">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <button type="submit">Login</button>
    <?php if (isset($error)): ?>
    <?php endif; ?>
</form>
<script src="../js/login.js"></script>
</body>
</html>