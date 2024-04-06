<?php 

require(__DIR__ . '/../../vendor/autoload.php');

$id = $_GET['id'];

$product = new App\Model\Products\Products();
$productById = $product->getProductById($id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        Product Details
                    </div>
                    <div class="card-body">
                        <?php foreach($productById as $product) { ?>
                            <h5 class="card-title"><?= $product['name']; ?></h5>
                            <p class="card-text"><?= $product['description']; ?></p>
                            <p class="card-text">Price: $<?= $product['price']; ?></p>
                            <p class="card-text">Quantity: <?= $product['quantity']; ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

