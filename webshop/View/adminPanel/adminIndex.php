<?php
require(__DIR__ . '/../../../vendor/autoload.php');
require_once('../../Controller/product/delete.php');

use App\Model\Products\Products;

$productModel = new Products();
$products = $productModel->getAllProduct();

require_once('../includes/adminHeader.php');
?>

    <!-- Admin Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Products</a>
                </li>
            </ul>
        </div>
    </nav>

    <?php 
    session_start();
        if(isset($_SESSION['delete-success'])): 
    ?>
        <div class="alert alert-danger" role="alert">
            <?= $_SESSION['delete-success'] ?>
            <?php unset($_SESSION['delete-success']); ?>
        </div>
    <?php endif; ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <a href="productPanel/add.php" class="btn btn-primary mb-2 ">Add new</a>
            <div class="list-group">
                <?php foreach ($products as $product): ?>
                    <div class="list-group-item mb-3 shadow">
                        <h3 class="mb-1"><?= $product['name']; ?></h3>
                        <p class="mb-1"><?= $product['description']; ?></p>
                        <p class="mb-1">Price: <?= $product['price']; ?></p>
                        <p class="mb-1"><?= ($product['quantity'] == 0) ? "Out of Stock" : "In Stock"; ?></p>
                        <!-- Update button -->
                        <a href="productPanel/update.php?id=<?= $product['id']; ?>" class="btn btn-primary">Update</a>
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
