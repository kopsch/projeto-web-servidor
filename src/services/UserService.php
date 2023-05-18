<?php

namespace Src\Services;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Pecee\SimpleRouter\Exceptions\HttpException;
use Src\Models\User;

class UserService
{
    public function __construct() 
    {
    }

    public function store(array $data)
    {
        $user = new User($data['username'], $data['name'], $data['email'], $data['password']);

        if ($user->verifyIfUserExists()) {
            http_response_code(400);
            header('Content-Type: application/json');
            
            $response = array(
                'error' => "E-mail ou nome de usuário já está cadastrado",
                'status' => 400
            );
            
            echo json_encode($response);
            exit();
        }

        $user->store();

        return $user;
    }

    public function getByUsername(string $username) {
        return User::getByUsername($username);
    }

    public function authenticate(array $data) {
        $user =$this->getByUsername($data['username']);
        
        if (!$user) {
            http_response_code(400);
            header('Content-Type: application/json');
            
            $response = array(
                'error' => "O usuário não existe",
                'status' => 400
            );
            
            echo json_encode($response);
            exit();
        }

        if (!password_verify($data['password'], $user->passwordToHash)) {
            http_response_code(400);
            header('Content-Type: application/json');
            
            $response = array(
                'error' => "O usuário ou senha são inválidos",
                'status' => 400
            );
            
            echo json_encode($response);
            exit();
        }

        $payload = [
            'username' => $user->username
        ];

        $jwtToken = JWT::encode($payload, $_ENV['JWT_KEY'], "HS256");
        setcookie('project_token', $jwtToken, time() + 86400, '/');

        return [
            'token' => $jwtToken
        ];
    }

    public function getAuthenticatedUser() {
        $jwt = $_COOKIE['project_token'];

        $decoded = JWT::decode($jwt, new Key($_ENV['JWT_KEY'], 'HS256'));

        $username = $decoded->username ?? '';

        $user = User::getByUsername($username);

        return $user;
    }
}