<?php

namespace Src\Controllers;

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
        $requestBody = json_decode(file_get_contents("php://input"), true);

        if (!$requestBody['password'] or !$requestBody['username'] or !$requestBody['name'] or !$requestBody['email']) {
            throw new \Exception("Todos os campos são obrigatórios", 400);
        }

        $this->userService->store($requestBody);

        echo json_encode([
            'data' => [
                'message' => 'Usuário Cadastrado',
            ]
        ]);
    }

    public function authenticate()
    {
        $requestBody = json_decode(file_get_contents("php://input"), true);

        if (!$requestBody['password'] or !$requestBody['username']) {
            throw new \Exception("Os campos 'email' e 'senha' são obrigatórios", 400);
        }

        $token = $this->userService->authenticate($requestBody);

        return json_encode([
            'data' => $token
        ]);
    }
}