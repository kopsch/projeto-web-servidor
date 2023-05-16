<?php

namespace Src\Models;

use PDO;
use PDOException;
use Ramsey\Uuid\Uuid;
use Src\Config\DatabaseConnector;

class User
{
    private string $username;
    private string $name;
    private string $email;
    private string $passwordToHash;
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

            return $result;
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