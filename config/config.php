<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

class DatabaseConnection
{
    private $host;
    private $db_name;
    private $username;
    private $password;
    private $connection;

    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/..');
        $dotenv->load();


        $this->host = $_ENV['DB_HOST'];
        $this->db_name = $_ENV['DB_NAME'];
        $this->username = $_ENV['DB_USER'];
        $this->password = $_ENV['DB_PASSWORD'];
    }


    public function getConnection()
    {
        $this->connection = null;

        try {
            $this->connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->exec("set names utf8");

        } catch (PDOException $e) {
            die ("Database connection error: " . $e->getMessage());
        }

        return $this->connection;
    }

}