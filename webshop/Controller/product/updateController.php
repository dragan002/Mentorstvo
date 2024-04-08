<?php
use App\Model\Products\Products;

$productModel = new Products();

if(isset($_POST['update'])) {
    if(isset($_POST['name'], $_POST['description'], $_POST['price'], $_POST['quantity'])) {
        $product = [
            'id' => $_POST['id'],
            'name' => $_POST['name'],
            'description' => $_POST['description'],
            'price' => $_POST['price'],
            'quantity' => $_POST['quantity']
        ];


    $updatedProduct = $productModel->updateProduct($product);
 
    if(!$updatedProduct) {
        die("There is some issues during updating");
    }
        header('Location: ../../../View/adminPanel/adminIndex.php');
}

}
?>