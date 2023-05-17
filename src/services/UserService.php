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
            throw new \Exception("Usuário já está cadastrado", 400);
        }

        $user->store();
    }

    public function getByUsername(string $username) {
        return User::getByUsername($username);
    }

    public function authenticate(array $data) {
        $user =$this->getByUsername($data['username']);
        
        if (!$user) {
            throw new \Exception("Usuário não existe", 400);
        }

        if (!password_verify($data['password'], $user[0]['password'])) {
            throw new \Exception("O usuário ou senha são inválidos", 400);
        }

        $payload = [
            'username' => $user[0]['username']
        ];

        return [
            'token' => JWT::encode($payload, $_ENV['JWT_KEY'], "HS256")
        ];
    }

    public function getAuthenticatedUser() {
        $headers = $_SERVER['HTTP_AUTHORIZATION'];
        
        $jwt = isset($headers) ? str_replace('Bearer ', '', $headers) : '';

        if (!$jwt) {
            throw new HttpException('Usuário não está logado', 403);
        }

        $decoded = JWT::decode($jwt, new Key($_ENV['JWT_KEY'], 'HS256'));

        $username = $decoded->username ?? '';

        $user = User::getByUsername($username);

        return $user;
    }
}