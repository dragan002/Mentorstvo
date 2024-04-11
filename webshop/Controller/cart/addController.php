<?php
require(__DIR__ . '/../../../vendor/autoload.php');


if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_POST['product_id']) || empty($_POST['product_id'])) {
    die("Unknown id of product");
}

$product = new App\Model\Products\Products();
$idProduct = $_POST['product_id'];
$productById = $product->getProductById($idProduct);

$quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 1;

$product = [
    'name' => $productById[0]['name'],
    'price' => $productById[0]['price'],
    'product_id' => $_POST['product_id'],
    'quantity' => $quantity,
    'user_id' => $_SESSION['id']
];

$cartModel = new App\Model\Cart\Cart();
$addToCart = $cartModel->addToCart($product);

header('Location: ../../index.php');
exit();
