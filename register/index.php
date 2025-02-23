<?php
require '../_base.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Replace with actual user registration logic
    // Example: Store $username and $password in the database
    // ...

    header('Location: ../login/index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/home_style.css">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<form method="POST" action="index.php" id="registerForm" class="login-form">
    <label for="username">Username:</label><input type="text" id="username" name="username" placeholder="username" required>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" placeholder="password" required>
    <button type="submit">Register</button>
</form>
</body>
</html>