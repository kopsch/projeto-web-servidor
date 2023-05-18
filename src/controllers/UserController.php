<?php

namespace Src\Controllers;

use Pecee\Http\Request;
use Src\Services\UserService;

class UserController
{
    private UserService $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function store()
    {

        if (!$_POST['password'] or !$_POST['username'] or !$_POST['name'] or !$_POST['email']) {
            http_response_code(400);
            header('Content-Type: application/json');
            
            $response = array(
                'error' => "Todos os campos são obrigatórios",
                'status' => 400
            );
            
            echo json_encode($response);
            exit();
        }

        $user = $this->userService->store($_POST);

        header('Location: /');
    }

    public function authenticate()
    {
        if (!$_POST['password'] or !$_POST['username']) {
            http_response_code(400);
            header('Content-Type: application/json');
            
            $response = array(
                'error' => "Os campos 'email' e 'senha' são obrigatórios",
                'status' => 400
            );
            
            echo json_encode($response);
            exit();
        }

        $token = $this->userService->authenticate($_POST);

        header('Location: /');
    }

    public function getAuthenticatedUser()
    {
        $user = $this->userService->getAuthenticatedUser();

        http_response_code(200);

        return json_encode([
            'data' => $user
        ]);
    }
}