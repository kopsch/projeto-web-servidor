<?php

use App\Services\UserService;
use App\Controllers\UserController;

require 'vendor/autoload.php';

define('BASE_URL', '/projeto-web-servidor/');
session_start();

    $method = $_SERVER['REQUEST_METHOD'];
    $path = $_SERVER['PATH_INFO'] ?? '/';

    $userService = new UserService();
    $userController = new UserController($userService);

    if ($_SERVER['REQUEST_URI'] == BASE_URL) {
        echo 'tela inicial';
    } elseif ($_SERVER['REQUEST_URI'] == BASE_URL . 'login' && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $userController->login();
    } elseif ($_SERVER['REQUEST_URI'] == BASE_URL . 'logout' && $_SERVER['REQUEST_METHOD'] == 'GET') {
        $userController->logout();
    } elseif ($_SERVER['REQUEST_URI'] == BASE_URL . 'register' && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $userController->register();
    } elseif ($_SERVER['REQUEST_URI'] == BASE_URL . 'test' && $_SERVER['REQUEST_METHOD'] == 'GET') {
        $userController->test();
    } elseif ($_SERVER['REQUEST_URI'] == BASE_URL . 'me' && $_SERVER['REQUEST_METHOD'] == 'GET') {
        $userController->getUser();
    } elseif ($_SERVER['REQUEST_URI'] == BASE_URL . 'users' && $_SERVER['REQUEST_METHOD'] == 'GET') {
        $userController->getUsers();
    } else {
        header('HTTP/1.0 404 Not Found');
        echo 'Página não encontrada';
    }

?>