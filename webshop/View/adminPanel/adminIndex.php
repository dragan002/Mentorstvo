<?php
require(__DIR__ . '/../../../vendor/autoload.php');
require('../../Controller/product/delete.php');

use App\Model\Database\Database;
use App\Model\Products\Products;

$database = new Database();
$conn = $database->getConnection();

$productModel = new Products();
$products = $productModel->getAllProduct();

require_once '../includes/header.php';

?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="list-group">
                <?php foreach ($products as $product): ?>
                    <div class="list-group-item mb-3 shadow">
                        <h3 class="mb-1"><?= $product['name']; ?></h3>
                        <p class="mb-1"><?= $product['description']; ?></p>
                        <p class="mb-1">Price: <?= $product['price']; ?></p>
                        <p class="mb-1"><?= ($product['quantity'] == 0) ? "Out of Stock" : "In Stock"; ?></p>
                        <!-- Update button -->
                        <a href="update_product.php?id=<?= $product['id']; ?>" class="btn btn-primary">Update</a>
                        <!-- Delete button -->
                        <a href="../../Controller/product/delete.php?id=<?= $product['id']; ?>" class="btn btn-danger">Delete</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php
    require_once '../includes/footer.php';
?>
