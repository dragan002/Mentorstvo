<?php
require(__DIR__ . '/../../../vendor/autoload.php');

if (!isset($_GET['search']) || empty($_GET['search'])) { 
    header('Location: ' .  $_SERVER['HTTP_REFERER']);
    exit(); 
}

if(isset($_GET['search'])) {
    $productModel = new App\Model\Products\Products();
    $searchTerm = $_GET['search'];
    $products = $productModel->searchProduct($searchTerm);
}

require_once '../includes/header.php';
?>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-5 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        Product Details
                    </div>
                    <div class="card-body shadow">
                        <?php foreach($products as $product) {  ?>
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

<?php
require_once '../includes/footer.php';
?>