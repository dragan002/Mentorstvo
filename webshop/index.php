<?php
require_once 'Model/Database/Database.php';
require_once 'Model/Products/Products.php';

$database = new Database();
$conn = $database->getConnection();

$items = new Products();
$products = $items->getAllProduct();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="listOfProducts">
        <?php foreach($products as $product) { ?>
            <h3><?= $product['name']; ?></h3>
            <p><?= $product['description'] ?></p>
            <p><?= $product['price'];?></p>
            <p><?= ($product['quantity']) == 0 ? "Nema na stanju" : "Ima na stanju"; ?></p>
            <!-- =================exericise=============-->
        <?php } ?>
    </div>
</body>
</html>
