<?php
require(__DIR__ . '/../../../vendor/autoload.php');

use App\Model\Products\Products;

if(isset($_POST['add'])) {
    if(isset($_POST['name'], $_POST['description'], $_POST['price'], $_POST['quantity'])) {
        $product = [
            'name' => $_POST['name'],
            'description' => $_POST['description'],
            'price' => $_POST['price'],
            'quantity' => $_POST['quantity']
        ];
        
        $productModel = new Products();
        
        $addProduct = $productModel->addProduct($product);
     
        if(!$addProduct) {
            die("There are some issues during inserting the new product");
        }
        header('Location: ../../View/adminPanel/adminIndex.php');
        exit(); // Always include exit() after header() to prevent further execution
    }
}
?>
