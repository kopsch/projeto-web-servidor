<?php

namespace Src\Models;

use PDO;
use PDOException;
use Ramsey\Uuid\Uuid;
use Src\Config\DatabaseConnector;
use Src\Controllers\UserController;

class User
{
    public string $username;
    public string $name;
    public string $email;
    public string $passwordToHash;
    private static $connection;
    

    public function __construct(string $username, string $name, string $email, string $passwordToHash)
    {
        $this->setConnection();
        $this->username = $username;
        $this->name = $name;
        $this->email = $email;
        $this->passwordToHash = $passwordToHash;
    }

    private function setConnection()
    {
        self::$connection = (new DatabaseConnector())->getConnection();
    }

    public function store()
    {
        $statement = "
            INSERT INTO users 
                (id, username, name, email, password)
            VALUES
                (:id, :username, :name, :email, :password);
        ";

        try {
            $statement = self::$connection->prepare($statement);
            $statement->execute([
                'id' => Uuid::uuid4()->toString(),
                'username' => $this->username,
                'name' => $this->name,
                'email' => $this->email,
                'password' => password_hash($this->passwordToHash, PASSWORD_BCRYPT)
            ]);

            return $statement->rowCount();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public static function getByUsername(string $username)
    {
        self::$connection = (new DatabaseConnector())->getConnection();

        $statement = "
            SELECT 
                *
            FROM
                users
            WHERE username = :username;
        ";

        try {
            $statement = self::$connection->prepare(($statement));
            $statement->execute(['username' => $username]);
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            $user = new User($result[0]['username'], $result[0]['name'], $result[0]['email'], $result[0]['password']);

            return $user;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public static function edit(string $password, string $name = '', string $email = '')
    {
        $user = json_decode((new UserController)->getAuthenticatedUser(), 1);
        $username = $user['data']['username'];
        self::$connection = (new DatabaseConnector())->getConnection();

        $statement = "
            UPDATE 
                users 
            SET
                name = :name,
                email = :email
            WHERE
                username = :username;
        ";

        try {
            $statement = self::$connection->prepare($statement);
            $statement->execute([
                'username' => $username,
                'name' => $name,
                'email' => $email
            ]);

            return $statement->rowCount();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function verifyIfUserExists()
    {
        $statement = "
        SELECT 
            *
        FROM
            users
        WHERE username = :username
        OR email = :email;
        ";

        try {
            $statement = self::$connection->prepare(($statement));
            $statement->execute(['username' => $this->username, 'email' => $this->email]);
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            if ($result) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
}