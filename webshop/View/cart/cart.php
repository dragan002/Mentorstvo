<?php
require(__DIR__ . '/../../../vendor/autoload.php');
include '../../Controller/cart/listController.php';

$subtotal = 0;
foreach ($items as $item) {
    $subtotal += $item['price'] * $item['quantity'];
}

// Calculate total
$shipping = 5;
$total = $subtotal + $shipping;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Shopping Cart</h1>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <?php if (!empty($items)) : ?>
                            <?php foreach ($items as $item) : ?>
                                <div class="list-group-item mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0"><?= $item['name']; ?></h5>
                                        <span class="badge badge-primary badge-pill">$<?= $item['price']; ?></span>
                                    </div>
                                    <p class="mb-1">Quantity: <?= $item['quantity']; ?></p>
                                    <p class="mb-0">Total: $<?= $item['price'] * $item['quantity']; ?></p>
                                    <form action="../../Controller/cart/deleteController.php" method="POST">
                                        <input type="hidden" name="item_id" value="<?= $item['id']; ?>">
                                        <button type="submit" class="btn btn-danger btn-sm mt-2">Delete</button>
                                    </form>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <p>Your cart is empty.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Cart Summary</h5>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Subtotal
                                <span class="badge badge-primary badge-pill">$<?= $subtotal; ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Shipping
                                <span class="badge badge-primary badge-pill">$<?= $shipping; ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Total
                                <span class="badge badge-primary badge-pill">$<?= $total; ?></span>
                            </li>
                        </ul>
                        <button class="btn btn-success btn-block mt-3">Proceed to Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
