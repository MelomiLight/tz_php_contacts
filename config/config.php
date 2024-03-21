<?php

class DatabaseConnection
{
    private $host;
    private $db_name;
    private $username;
    private $password;
    private $connection;

    public function __construct($host = 'localhost', $db_name = 'crud', $username = 'root', $password = 'mypassword')
    {
        $this->host = $host;
        $this->db_name = $db_name;
        $this->username = $username;
        $this->password = $password;
    }
    

    public function getConnection()
    {
        $this->connection = null;

        try {
            $this->connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->exec("set names utf8");
                        
        } catch (PDOException $e) {
            die("Database connection error: ". $e->getMessage());
        }

        return $this->connection;
    }

}