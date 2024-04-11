<?php
require(__DIR__ . '/../../../vendor/autoload.php');

if(session_status()  == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_GET['id']) || empty($_GET['id'])) {
   die('Something went wrong');
}

$id = $_GET['id'];

$product = new App\Model\Products\Products();

$productById = $product->getProductById($id);

if (!$productById) {
    die('Something went wrong');
}
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
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Product Details
                    </div>
                    <div class="card-body">
                        <?php foreach($productById as $product) : ?>
                            <h5 class="card-title"><?= $product['name']; ?></h5>
                            <p class="card-text"><?= $product['description']; ?></p>
                            <p class="card-text">Price: $<?= $product['price']; ?></p>
                            <p class="card-text">Quantity: <?= $product['quantity']; ?></p>
                            <?php if(isset($_SESSION['login-success'])) :?>
                            <form action="../../Controller/cart/addController.php" method="POST" class="form-inline">
                                <div class="form-group mr-2">
                                    <input type="number" class="form-control" name="quantity" placeholder="Type a quantity">
                                    <input type="hidden" class="form-control" name="product_id" value=<?= $product['id']?> placeholder="Type a quantity">
                                </div>
                                <button type="submit" class="btn btn-success" onclick="addToCart(<?= $product['id']; ?>)">Add to Cart</button>
                            </form>
                            <?php else : ?>
                                <p>Please log in to continue with shopping</p>
                                <a href="../auth/login.php" class="btn btn-primary">Log in</a>
                            <?php endif; ?>
                        <?php endforeach; ?>
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