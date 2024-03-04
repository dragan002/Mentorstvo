<?php
require_once('Database.php');
require_once('Users.php');
require_once('Product.php');

$database = new Database();
$conn = $database->getConnection();

$rowCount = new Users();
echo $rowCount->getRowCount();
echo "<hr>";

$allUsers = new Users();
print_r($allUsers->getAllData());;
echo "<hr>";

$product = new Product();
$listOfProducts = $product->getAllProduct();
var_dump($listOfProducts);




