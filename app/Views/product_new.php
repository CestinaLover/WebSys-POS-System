
<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
</head>
<body>

<h1>Add New Product</h1>

<p><a href="<?= base_url('/products') ?>">Back to Products</a></p>

<?php foreach (session('errors') ?? [] as $error): ?>
    <p><?= esc($error) ?></p>
<?php endforeach; ?>

<form action="<?= base_url('/products/create') ?>"
      method="post" enctype="multipart/form-data">

    <?= csrf_field() ?>

    <p>
        <label>Product Name</label><br>
        <input type="text" name="name" value="<?= esc(old('name')) ?>">
    </p>

    <p>
        <label>Price</label><br>
        <input type="number" name="price" step="0.01" min="0"
               value="<?= esc(old('price')) ?>">
    </p>

    <p>
        <label>Stock Quantity</label><br>
        <input type="number" name="stock_quantity" min="0"
               value="<?= esc(old('stock_quantity')) ?>">
    </p>

    <p>
        <label>Product Image (JPG/PNG, max 2MB)</label><br>
        <input type="file" name="image" accept=".jpg,.jpeg,.png">
    </p>

    <button type="submit">Save Product</button>
</form>

</body>
</html>
