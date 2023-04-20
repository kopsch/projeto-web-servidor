<?php

namespace App\Controllers;

use App\Services\UserService;

class UserController
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login()
    {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = $this->userService->authenticate($email, $password);

    if ($user) {
        $_SESSION['user'] = $user;
        header('Location: /projeto-web-servidor/home');
    } else {
        $loginError = 'Usuário ou senha inválidos';
    }

    }

    public function logout()
    {
        session_destroy();
        header('Location: /projeto-web-servidor');
        exit;
    }

    public function register(): void
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $this->userService->create($name, $email, $password);

        if ($user !== false) {
            header('Location: /projeto-web-servidor');
        } else {
            echo 'Falhou';
        }
    }

    public function edit(): void
    {
        $name = $_POST['name'];
        $password = $_POST['password'];

        $user = $this->userService->edit($name, $password);

        if ($user !== false) {
            $_SESSION['user'] = $user;
            header('Location: /projeto-web-servidor/home');
        } else {
            echo 'Falhou';
        }
    }
}