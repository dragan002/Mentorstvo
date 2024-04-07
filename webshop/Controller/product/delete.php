<?php
require(__DIR__ . '/../../../vendor/autoload.php');

use App\Model\Products\Products;

if(!isset($_GET['id'])) {
    return null;
}

$id = $_GET['id'];

$productModel = new Products();

if(!$deleteProduct = $productModel->deleteProduct($id)) {
    die("Something went wrong during deleting item from Database");
}

$_SESSION['delete-success'] = "Succesfully deleted item";
header("Location: ../../View/adminPanel/adminIndex.php");
exit();
    