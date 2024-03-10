<?php
require_once('../../model/databaseModel/Database.php');
require_once('../../model/productModel/Product.php');

$database = new Database();
$conn = $database->getConnection(); 

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = isset($_POST['productName']) ? $_POST['productName'] : '';
    $description = isset($_POST['productDescription']) ? $_POST['productDescription'] : '';
    $price = isset($_POST['productPrice']) ? $_POST['productPrice'] : '';
    $image = isset($_POST['productImage']) ? $_POST['productImage'] : '';
    $quantity = isset($_POST['productQuantity']) ? $_POST['productQuantity'] : '';

    $product = new Product($conn);
    $newProduct = $product->addProduct($name, $description, $price, $image, $quantity);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $typedWord = $_GET['search'];

    $search = new Product($conn);
    $results = $search->searchProduct($typedWord);
    if (!$results) {
        die("Can't find your word $typedWord in our database");
    }
    
    $count = 1;
    foreach ($results as $product) { ?>
        <h3><?php echo $count . '. ' . $product['ime'] . ' ' . $product['opis']; ?></h3>
        <?php
        $count++;
    }
}
?>
