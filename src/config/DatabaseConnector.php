<?php

namespace Src\Config;
use PDO;
use PDOException;

class DatabaseConnector
{
    private $dbConnection = null;

    public function __construct() {
        $db_host = $_ENV['DB_HOST'];
        $db_port = $_ENV['DB_PORT'];
        $db = $_ENV['DB_DATABASE'];
        $db_user = $_ENV['DB_USERNAME'];
        $db_password = $_ENV['DB_PASSWORD'];

        try {
            $this->dbConnection = new PDO(
                "mysql:host=$db_host;port=$db_port;charset=utf8mb4;dbname=$db",
                $db_user,
                $db_password
            );
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->dbConnection;
    }
}