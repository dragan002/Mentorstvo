<?php 

include 'index.php';
include 'classes/Product.php';
include 'functions.php';



if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = validateInput(htmlspecialchars($_POST['name']), 'Name');
    $description = validateInput(htmlspecialchars(strip_tags($_POST['description'])), 'Description');
    $price = validateInput(filter_var($_POST['price'], FILTER_VALIDATE_FLOAT), 'Price');
    $date = validateInput($_POST['date'], 'Date');
    $quantity = validateInput(filter_var($_POST['quantity'], FILTER_VALIDATE_INT), 'Quantity');
}


$products = new Product($db);
$products->addProduct($name, $description, $price, $date, $quantity);