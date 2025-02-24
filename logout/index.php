<?php
session_start();
session_unset();
session_destroy();
setcookie('access_token', '', time() - 3600, '/');
header('Location: /');
exit;
