<?php
require(__DIR__ . '/../vendor/autoload.php');

$database = new App\Model\Database\Database();
$conn = $database->getConnection();

$items = new App\Model\Products\Products();
$products = $items->getAllProduct();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="list-group">
                    <?php foreach($products as $product) { ?>
                        <div class="list-group-item">
                            <h3 class="mb-1"><?= $product['name']; ?></h3>
                            <p class="mb-1"><?= $product['description']; ?></p>
                            <p class="mb-1">Price: <?= $product['price']; ?></p>
                            <p class="mb-1"><?= ($product['quantity']) == 0 ? "Out of Stock" : "In Stock"; ?></p>
                            <a href="view/product.php?id=<?= $product['id']; ?>" class="btn btn-primary">Details</a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

