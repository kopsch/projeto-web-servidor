<?php

namespace App;

use App\Services\UserService;
use App\Controllers\UserController;

require_once 'config/clear_cache.php';

session_start();

try {
    $method = $_SERVER['REQUEST_METHOD'];
    $path = $_SERVER['PATH_INFO'] ?? '/';

    $users = [
        [
            'name'          => 'Fulano de Tal',
            'email'         => 'fulano@example.com',
            'password'      =>  password_hash('abcdef', PASSWORD_DEFAULT)
        ],
        [
            'name'          => 'Ciclano da Silva',
            'email'         => 'ciclano@example.com',
            'password'      => password_hash('123456', PASSWORD_DEFAULT)
        ]
    ];

    $userService = new UserService($users);
    $userController = new UserController($userService);

    $route = isset($_GET['route']) ? $_GET['route'] : '';

    switch ("$method $path") {
        case 'POST /login':
            $userController->login();
            break;
        case 'GET /logout':
            $userController->logout();
            break;
        case 'POST /register':
            $userController->register();
        case 'GET /test':
            $userController->test();
        default:
            http_response_code(404);
            echo 'Página não encontrada';
            break;
    }
} catch (\Exception $e) {
    http_response_code(500);
    echo 'Erro interno do servidor: ' . $e->getMessage();
}

?>