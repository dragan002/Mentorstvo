<?php
require(__DIR__ . '/../vendor/autoload.php');

$database = new App\Model\Database\Database();
$conn = $database->getConnection();

$items = new App\Model\Products\Products();
$products = $items->getAllProduct();

require_once 'View/includes/header.php';
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <?php
                session_start();

                if(isset($_SESSION['success_message'])) {
                    echo '<div class="alert alert-success" role="alert">' . $_SESSION['success_message'] . '</div>';
                    unset($_SESSION['success_message']);
                }
            ?>
            <div class="list-group">
                <?php foreach($products as $product) { ?>
                    <div class="list-group-item mb-3 shadow">
                        <h3 class="mb-1 "><?= $product['name']; ?></h3>
                        <p class="mb-1"><?= $product['description']; ?></p>
                        <p class="mb-1">Price: <?= $product['price']; ?></p>
                        <p class="mb-1"><?= ($product['quantity']) == 0 ? "Out of Stock" : "In Stock"; ?></p>
                        <a href="View/product/product.php?id=<?= $product['id']; ?>" class="btn btn-primary">Details</a>
                        <button class="btn btn-success " onclick="addToCart(<?= $product['id']; ?>)">Add to Cart</button>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php
require_once 'View/includes/footer.php';

?>



