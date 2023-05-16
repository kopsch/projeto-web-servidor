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
            return false;
        }

        return true;
    }

    public function getByUsername(string $username) {
        return User::getByUsername($username);
    }

    public function authenticate(array $data) {
        $user =$this->getByUsername($data['username']);

        var_dump($user);
    }
}