<?php

namespace App\Services;

use App\Models\User;

class UserService {
    private $users;

    public function __construct(array $users) {
        $this->users = $users;
    }

    public function authenticate(string $email, string $password): ?User {
        // Busca o usuário pelo e-mail
        $user = array_filter($this->users, function ($user) use ($email) {
            return $user['email'] === $email;
        });

        // Verifica se o usuário foi encontrado
        if (empty($user)) {
            return null;
        }

        // Converte o array em um objeto User
        $user = new User($user['name'], $user['email'], $user['password']);

        // Verifica se a senha está correta
        if (!password_verify($password, $user->getPassword())) {
            return null;
        }

        return $user;
    }

    public function create(string $name, string $email, string $password)
    {
        // Verifica se o e-mail já está sendo usado
        foreach ($this->users as $user) {
            if ($user['email'] === $email) {
                return false;
            }
        }

        // Cria um novo usuário
        $user = new User(
            $name,
            $email,
            password_hash($password, PASSWORD_DEFAULT)
        );

        // Adiciona o novo usuário ao array
        $this->users[] = $user;

        return $user;
    }
}