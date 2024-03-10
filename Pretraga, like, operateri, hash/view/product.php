<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <title>Add New Product</title>
</head>
<body>

<div class="container mt-5">
  <h2>Add New Product</h2>
  <form>
    <div class="mb-3">
      <label for="productName" class="form-label">Product Name</label>
      <input type="text" class="form-control" id="productName" name="productName" required>
    </div>
    <div class="mb-3">
      <label for="productDescription" class="form-label">Product Description</label>
      <textarea class="form-control" id="productDescription" name="productDescription" rows="3" required></textarea>
    </div>
    <div class="mb-3">
      <label for="productPrice" class="form-label">Product Price</label>
      <input type="number" class="form-control" id="productPrice" name="productPrice" min="0" step="0.01" required>
    </div>
    <div class="mb-3">
      <label for="productImage" class="form-label">Product Image</label>
      <input type="file" class="form-control" id="productImage" name="productImage" accept="image/*" required>
    </div>
    <div class="mb-3">
      <label for="productQuantity" class="form-label">Product Quantity</label>
      <input type="number" class="form-control" id="productQuantity" name="productQuantity" min="0" required>
    </div>
    <button type="submit" class="btn btn-primary">Add Product</button>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-ea0Hw7YpoqWMF8At5Q8br5shdWaPFeBDhjP+2ZbDI5E8I6z9nY4i/JQb8Wp+WJtw" crossorigin="anonymous"></script>
</body>
</html>
