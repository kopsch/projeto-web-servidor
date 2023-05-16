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
        $response = $this->userService->store($requestBody);

        echo json_encode([
            'data' => [
                'message' => $response ? 'Usuário Cadastrado' : 'Usuário já existe',
                'success' => $response
            ]
            ]);
    }

    public function authenticate()
    {
        $requestBody = json_decode(file_get_contents("php://input"), true);
        $token = $this->userService->store($requestBody);
    }
}