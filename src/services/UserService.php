<?php

namespace Src\Services;
use PDO;
use Ramsey\Uuid\Uuid;
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
        
        if (!isset($user)) {
            throw new \Exception("Usuário não existe", 400);
        }

        if (password_verify($data['password'], $user[0]['password'])) {
            return true;
        }
    }
}