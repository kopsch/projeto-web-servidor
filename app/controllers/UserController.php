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
        if(isset($_SESSION['user'])) {
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
                echo json_encode(array('message' => 'Usuario ou senha invalidos'));
            }
        } else {
            http_response_code(422);
            echo json_encode(array('message' => 'Usuario já logado'));
        }
    }

    public function getUser()
    {
        echo $this->userService->getUser();
    }

    public function logout()
    {
        echo json_encode($_SESSION['user']);
        session_destroy();
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