<?php
require_once '_base.php';
session_start();

$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);
$route = trim($request_uri[0], '/');

switch ($route) {
    case 'login':
        require_once 'php/login.php';
        break;
    case 'register':
        require_once 'php/register.php';
        break;
    case 'logout':
        require_once 'php/logout.php';
        break;
    case 'cart':
        require_once 'php/cart.php';
        break;
    default:
        require_once 'php/home.php';
        break;
}