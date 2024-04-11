<?php
require(__DIR__ . '/../../../vendor/autoload.php');

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

$cartModel = new App\Model\Cart\Cart();

$deleteItem = $cartModel->deleteProductFromCart($_SESSION['id']);

header('Location: ../../View/cart/cart.php');
exit();

