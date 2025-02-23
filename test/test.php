<?php
$password = password_hash("admin123", PASSWORD_DEFAULT);
echo $password;
echo "<br>";
if (password_verify("admin123", $password)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}