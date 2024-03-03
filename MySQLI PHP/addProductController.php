<?php 

include 'index.php';
include 'classes/Product.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $date = $_POST['date'];
    $quantity = $_POST['quantity'];
}

$products = new Product($db);
$products->addProduct($name, $description, $price, $date, $quantity);