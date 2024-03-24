<?php

require_once __DIR__ . '/../controllers/ProductsController.php';
require_once __DIR__ . '/Router.php';

$productsController = new ProductsController();


Router::get('/products', function () {
    global $productsController;
    $id = $_GET['id'] ?? null;

    if ($id) {
        $productsController->getProductById($id);
    } else {
        echo $productsController->getProducts();
    }
});

Router::post('/products', function () {
    global $productsController;
    $productsController->createProduct();
});

Router::put('/products', function () {
    global $productsController;
    $id = $_GET['id'] ?? null;

        if ($id) {
            $productsController->updateProduct($id);
        } else {
            http_response_code(400);
            echo json_encode(["error" => "Missing product ID"]);
        }
    });

    Router::delete('/products', function () {
        global $productsController;
        $id = $_GET['id'] ?? null;

        if ($id) {
            $productsController->deleteProduct($id);
    } else {
        http_response_code(400);
        echo json_encode(["error" => "Missing product ID"]);
    }
});


Router::dispatch(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), $_SERVER['REQUEST_METHOD']);
