<?php
require(__DIR__ . '/../../../vendor/autoload.php');

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

$cartModel = new App\Model\Cart\Cart(); 
$userId = $_SESSION['id'];
$items = $cartModel->findAllFromCartByUser($userId);

