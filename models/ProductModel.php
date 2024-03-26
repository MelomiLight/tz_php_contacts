<?php

require_once __DIR__ . '/../config/config.php';

class ProductModel
{
    private $conn;

    public function __construct()
    {
        $databaseConnection = new DatabaseConnection();
        $this->conn = $databaseConnection->getConnection();
    }

    public function getAllProducts(): array
    {
        $stmt = $this->conn->prepare('SELECT * FROM `products`');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductById($id)
    {
        $stmt = $this->conn->prepare('SELECT * FROM `products` WHERE `id` = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createProduct($title, $price, $description)
    {
        $stmt = $this->conn->prepare('INSERT INTO `products` (`id`, `title`, `price`, `description`) VALUES (NULL, :title, :price, :description)');
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':price', $price, PDO::PARAM_INT);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->execute();
        return $this->conn->lastInsertId();
    }

    public function updateProduct($id, $title, $price, $description)
    {
        $stmt = $this->conn->prepare('UPDATE `products` SET `title`=:title, `price`=:price, `description`=:description WHERE `id` = :id');
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':price', $price, PDO::PARAM_INT);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function deleteProduct($id)
    {
        $stmt = $this->conn->prepare('DELETE FROM `products` WHERE `id` = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}