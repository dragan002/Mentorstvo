<?php
require __DIR__ . '/../vendor/autoload.php';

use App\Model\Database\Database;
use App\Model\Products\Products;

$database = new Database();
$conn = $database->getConnection();

$productModel = new Products();
$products = $productModel->getAllProduct();

require_once 'View/includes/header.php';
?>

<div class="container mt-5">    
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="row mb-3">
                <div class="col-md-6">
                    <form action="View/product/searchPage.php" method="GET" class="form-inline">
                        <div class="form-group mr-2">
                            <input type="text" class="form-control" name="search" placeholder="Search products">
                        </div>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
            </div>

            <?php if (isset($_SESSION['success_message'])): ?>
                <div class="alert alert-success" role="alert">
                    <?= $_SESSION['success_message'] ?>
                </div>
                <?php unset($_SESSION['success_message']); ?>
            <?php endif; ?>

            <?php if (isset($_SESSION['login-success'])): ?>
                <div class="alert alert-success" role="alert">
                    <?= $_SESSION['login-success'] ?>
                </div>
                <?php endif; ?>
                
                <div class="list-group">
                    <?php foreach ($products as $product): ?>
                        <div class="list-group-item mb-3 shadow">
                            <h3 class="mb-1"><?= $product['name']; ?></h3>
                            <p class="mb-1"><?= $product['description']; ?></p>
                            <p class="mb-1">Price: <?= $product['price']; ?></p>
                            <p class="mb-1"><?= ($product['quantity'] == 0) ? "Out of Stock" : "In Stock"; ?></p>
                            <a href="View/product/details.php?id=<?= $product['id']; ?>" class="btn btn-primary">Details</a>
                            <?php if(isset($_SESSION['login-success'])) :?>
                                <button class="btn btn-success" onclick="addToCart(<?= $product['id']; ?>)">Add to Cart</button>
                                <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php
require_once 'View/includes/footer.php';
?>
