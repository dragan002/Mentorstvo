<?php
require(__DIR__ . '/../../../../vendor/autoload.php');
require_once('../../../Controller/product/updateController.php');


use App\Model\Products\Products;

$productModel = new Products();

$id = $_GET['id'];
$productToUpdate = $productModel->getProductById($id);

require_once('../../includes/adminHeader.php');
?>

<div class="container mt-5">

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    Update Product
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?= $productToUpdate[0]['id']; ?>">
                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= $productToUpdate[0]['name']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="description">Product Description</label>
                            <textarea class="form-control" id="description" name="description"><?= $productToUpdate[0]['description']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Product Price</label>
                            <input type="number" class="form-control" id="price" name="price" value="<?= $productToUpdate[0]['price']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Product Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" value="<?= $productToUpdate[0]['quantity']; ?>">
                        </div>
                        <button type="submit" name="update" class="btn btn-primary">Update Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once('../../includes/footer.php');
?>
