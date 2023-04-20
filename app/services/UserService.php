<?php

namespace App\Services;

use App\Models\User;

class UserService {
    private $users;

    public function __construct() {
        $this->loadUsers();
    }

    public function authenticate(string $email, string $password) {
        foreach ($this->users as $foundUser) {
            if ($foundUser['email'] === $email) {
                $user = $foundUser;
                break;
            }
        }

        // Verifica se o usuário foi encontrado
        if (empty($user)) {
            return null;
        }

        // Converte o array em um objeto User
        $user = new User($user['name'], $user['email'], $user['password']);

        // Verifica se a senha está correta
        if ($password !== $user->getPassword()) {
            return null;
        }

        return $user;
    }

    public function getUser()
    {
        return json_encode($_SESSION['user']);
    }

    public function getUsers()
    {
        return json_encode($this->users);
    }

    public function create(string $name, string $email, string $password)
    {
        // Verifica se o e-mail já está sendo usado
        foreach ($this->users as $user) {
            if ($user['email'] === $email) {
                return false;
            }
        }

        $user = array("name" => $name, "email" => $email, "password" => $password);

        // Adiciona o novo usuário ao array
        $this->users[] = $user;

        $this->saveUsers();

        return $user;
    }

    private function saveUsers()
    {
        $data = serialize($this->users);
        file_put_contents('users.txt', $data);
    }

    private function loadUsers()
    {
        if (file_exists('users.txt')) {
            $data = file_get_contents('users.txt');
            $this->users = unserialize($data);
        } else {
            $this->users = [
                [
                    'name'          => 'Fulano de Tal',
                    'email'         => 'fulano@example.com',
                    'password'      =>  'abcdef'
                ],
                [
                    'name'          => 'Ciclano da Silva',
                    'email'         => 'ciclano@example.com',
                    'password'      => '123456'
                ]
            ];
        }
    }
}