<?php

require_once __DIR__ . '/../controllers/ProductsController.php';


$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY) ?? '';

parse_str($query, $params);

$id = $params['id'] ?? null;

$productsController = new ProductsController();

switch ($requestUri) {
    case '/products':
        switch ($method) {
            case 'GET':
                if ($id) {
                    $productsController->getProductById($id);
                } else {
                    echo $productsController->getProducts();
                }
                break;
            case 'POST':
                $productsController->createProduct();
                break;
            case 'PUT':
                if ($id) {
                    $productsController->updateProduct($id);
                }
                break;
            case 'DELETE':
                if ($id) {
                    $productsController->deleteProduct($id);
                }
                break;
            default:
                header('HTTP/1.1 405 Method Not Allowed');
                break;
        }
        break;
    default:
        header('HTTP/1.1 404 Not Found');
        echo '404 Not Found';
        break;
}

