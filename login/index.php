<?php

use Random\RandomException;

require '../_base.php';
require '../api/Database.php';
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: /');
    exit;
}

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

        // Generate access_token
        try {
            $access_token = bin2hex(random_bytes(16));
        } catch (RandomException $e) {
        }

        // Save access_token in the database
        $dbConfig = require '../api/config.php';
        $db = new Database($dbConfig);
        $conn = $db->getConnection();
        $stmt = $conn->prepare("INSERT INTO access_tokens (username, token, expires_at) VALUES (:username, :token, :expires_at)");
        $stmt->execute([
            ':username' => $username,
            ':token' => $access_token,
            ':expires_at' => date('Y-m-d H:i:s', time() + 86400) // 1 day expiration
        ]);

        // Set access_token cookie
        setcookie('access_token', $access_token, time() + 86400, '/');

//        header('Location: /');
        echo $access_token;
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
    <input type="text" id="username" name="username" placeholder="username" required>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" placeholder="password" required>
    <button type="submit">Login</button>
    <?php if (isset($error)): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
</form>
</body>
</html>