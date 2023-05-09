<?php

require 'vendor/autoload.php';
use Dotenv\Dotenv;
use Src\Config\DatabaseConnector;

$dotenv = Dotenv::createImmutable(__DIR__);

$dotenv->load();

$dbConnection = (new DatabaseConnector())->getConnection();

// test code, should output:
// api://default
// when you run $ php bootstrap.php
echo $_ENV['OKTAAUDIENCE'];