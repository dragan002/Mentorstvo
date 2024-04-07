<?php
require __DIR__ . '/../vendor/autoload.php';

use App\Model\Database\Database;
use App\Model\Products\Products;

$database = new Database();
$conn = $database->getConnection();

$productModel = new Products();
$products = $productModel->getAllProduct();

// Include header
require_once 'View/includes/header.php';
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
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
                <?php unset($_SESSION['login-success']); ?>
            <?php endif; ?>

            <div class="list-group">
                <?php foreach ($products as $product): ?>
                    <div class="list-group-item mb-3 shadow">
                        <h3 class="mb-1"><?= $product['name']; ?></h3>
                        <p class="mb-1"><?= $product['description']; ?></p>
                        <p class="mb-1">Price: <?= $product['price']; ?></p>
                        <p class="mb-1"><?= ($product['quantity'] == 0) ? "Out of Stock" : "In Stock"; ?></p>
                        <a href="View/product/product.php?id=<?= $product['id']; ?>" class="btn btn-primary">Details</a>
                        <button class="btn btn-success" onclick="addToCart(<?= $product['id']; ?>)">Add to Cart</button>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php
// Include footer
require_once 'View/includes/footer.php';
?>
