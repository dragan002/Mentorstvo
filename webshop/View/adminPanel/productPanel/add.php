<?php
require(__DIR__ . '/../../../../vendor/autoload.php');

use App\Model\Products\Products;

$productModel = new Products();

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
                    <form action="../../../Controller/product/addController.php" method="POST">
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Product Description</label>
                            <textarea class="form-control" id="description" name="description" required> </textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Product Price</label>
                            <input type="number" class="form-control" id="price" name="price" required>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Product Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" required>
                        </div>
                        <button type="submit" name="add" class="btn btn-primary">Add Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once('../../includes/footer.php');
?>
