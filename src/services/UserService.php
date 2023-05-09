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

    public function store($data): bool
    {
        $user = new User($data['username'], $data['name'], $data['email'], $data['password']);

        if ($user->verifyIfUserExists()) {
            return false;
        }

        $user->store();

        return true;
    }

    public function getByUsername($data) {
        $user = User::getByUsername($data['username']);

        return $user;
    }
}