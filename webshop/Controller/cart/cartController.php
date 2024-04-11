<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_POST['product_id']) || empty($_POST['product_id'])) {
    die("Unknown id of product");
}

if(!isset($_POST['quantity']) || empty($_POST['quantity'])) {
    die("Unknown quanitity of product");
}

$idProduct = $_POST['product_id'];
$quantity = $_POST['quantity'];
$userId = $_SESSION['id'];

var_dump($userId);