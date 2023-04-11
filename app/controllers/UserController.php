<?php

namespace App\Controllers;

use App\Services\UserService;

class UserController
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login()
    {
        $data = json_decode(file_get_contents("php://input"), true);

        $email = $data['email'];
        $password = $data['password'];

        $user = $this->userService->authenticate($email, $password);

        if ($user) {
            $_SESSION['user'] = $user;
            http_response_code(200);
            echo json_encode($user);
        } else {
            http_response_code(401);
            echo json_encode(array('message' => 'Usuário ou senha inválidos'));
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: login.php');
        exit;
    }

    public function register(): void
    {
        $data = json_decode(file_get_contents("php://input"), true);

        $name = $data['name'];
        $email = $data['email'];
        $password = $data['password'];

        $user = $this->userService->create($name, $email, $password);

        if ($user !== false) {
            http_response_code(201);
            echo json_encode(array('message' => 'Usuário Cadastrado', 'data' => $user));
        } else {
            http_response_code(401);
            echo json_encode(array('message' => 'Esse email já está em uso'));
        }
    }

    public function test(): void
    {
        echo json_encode(array('message' => 'Testando...'));
    }
}