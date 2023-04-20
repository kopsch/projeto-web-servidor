<?php

use App\Services\UserService;
use App\Controllers\UserController;

require 'vendor/autoload.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

define('BASE_URL', $_SERVER['REQUEST_URI']);
session_start();

$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['PATH_INFO'] ?? '/';

$userService = new UserService();
$userController = new UserController($userService);

if ($_SERVER['REQUEST_URI'] === BASE_URL) {
    if (!isset($_SESSION['user'])) {
        require_once 'app/views/login.php';
    } else {
        header('Location: /projeto-web-servidor/home');
    }
} elseif ($_SERVER['REQUEST_URI'] === BASE_URL . 'home') {
    if (!isset($_SESSION['user'])) {
        header('Location: /projeto-web-servidor');
    } else {
        require_once 'app/views/session.php';
    }
} elseif ($_SERVER['REQUEST_URI'] === BASE_URL . 'register') {
    if (!isset($_SESSION['user'])) {
        require_once 'app/views/register.php';
    } else {
        header('Location: /projeto-web-servidor/home');
    }
} elseif ($_SERVER['REQUEST_URI'] === BASE_URL . 'edit') {
    if (!isset($_SESSION['user'])) {
        header('Location: /projeto-web-servidor');
    } else {
        require_once 'app/views/edit.php';
    }
} elseif ($_SERVER['REQUEST_URI'] === BASE_URL . 'api/login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $userController->login();
} elseif ($_SERVER['REQUEST_URI'] === BASE_URL . 'api/logout' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $userController->logout();
} elseif ($_SERVER['REQUEST_URI'] === BASE_URL . 'api/register' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $userController->register();
} elseif ($_SERVER['REQUEST_URI'] === BASE_URL . 'api/edit' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $userController->edit();
} else {
    header('HTTP/1.0 404 Not Found');
    echo 'Página não encontrada';
}

?>