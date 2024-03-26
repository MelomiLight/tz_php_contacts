<?php

require_once __DIR__ . '/../models/ProductModel.php';
require_once __DIR__ . '/../validators/ProductValidator.php';


class ProductsController
{
    private $productModel;

    public function __construct() {
        $this->productModel = new ProductModel();
    }
    public function getProducts()
    {
        try {
            $products = $this->productModel->getAllProducts();

            header('Content-Type: application/json');
    
            echo json_encode($products);
        } catch (PDOException $e) {
            die ("Could not get products: " . $e->getMessage());
        }
    }

    public function getProductById($id)
    {
        try {
            $product = $this->productModel->getProductById($id);

            header('Content-Type: application/json');
        
            echo json_encode($product[0] ?? new stdClass);
    
        } catch (PDOException $e) {
            die("Could not get product: " . $id . " " . $e->getMessage());
        }
    }
    

    public function createProduct()
    {
       
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        $validationResult = ProductValidator::validateProductData($data);
        if ($validationResult !== true) {
            header('Content-Type: application/json');
            http_response_code(400);
            echo json_encode(['error' => $validationResult]);
            exit;
        }

        $title = $data['title'];
        $description = $data['description'];
        $price = $data['price'];

        try {
            $productId = $this->productModel->createProduct($title,$price,$description);

            header('Content-Type: application/json');
            header('HTTP/1.1 201 Created');

            echo json_encode(['message' => 'Product created', 'id' => $productId]);
        } catch (PDOException $e) {
            header('Content-Type: application/json');
            http_response_code(500); 
            echo json_encode(["error" => "Could not create product: " . $e->getMessage()]);
            exit;
        }

    }

    public function updateProduct($id)
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        
        $validationResult = ProductValidator::validateProductData($data);
        if ($validationResult !== true) {
            header('Content-Type: application/json');
            http_response_code(400);
            echo json_encode(['error' => $validationResult]);
            exit;
        }

        $title = $data['title'];
        $description = $data['description'];
        $price = $data['price'];

        try {

            $this->productModel->updateProduct($id,$title,$price,$description);

            header('Content-Type: application/json');
            header('HTTP/1.1 200 OK');
        
            echo json_encode(['message' => 'Product updated successfully', 'id' => $id]);
        } catch (PDOException $e) {
            header('Content-Type: application/json');
            http_response_code(500); 
            echo json_encode(["error" => "Could not update product: " . $e->getMessage()]);
            exit;
        }
    }

    public function deleteProduct($id)
    {
        try {

            $this->productModel->deleteProduct($id);

            header('Content-Type: application/json');
            header('HTTP/1.1 200 OK');

            echo json_encode(['message' => 'Product deleted successfully', 'id' => $id]);

        } catch (PDOException $e) {
            die ("Could not delete product: " . $id . " " . $e->getMessage());
        }
    }

}