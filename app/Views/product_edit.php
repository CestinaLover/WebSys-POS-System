
<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>

<h1>Edit Product</h1>

<p><a href="<?= base_url('/products') ?>">Back to Products</a></p>

<?php foreach (session('errors') ?? [] as $error): ?>
    <p><?= esc($error) ?></p>
<?php endforeach; ?>

<form action="<?= base_url('/products/update/' . $product['id']) ?>"
      method="post" enctype="multipart/form-data">

    <?= csrf_field() ?>

    <p>
        <label>Product Name</label><br>
        <input type="text" name="name"
               value="<?= esc(old('name', $product['name'])) ?>">
    </p>

    <p>
        <label>Price</label><br>
        <input type="number" name="price" step="0.01" min="0"
               value="<?= esc(old('price', $product['price'])) ?>">
    </p>

    <p>
        <label>Stock Quantity</label><br>
        <input type="number" name="stock_quantity" min="0"
               value="<?= esc(old('stock_quantity', $product['stock_quantity'])) ?>">
    </p>

    <?php if (! empty($product['image'])): ?>
        <p>
            <img src="<?= base_url('uploads/products/' . $product['image']) ?>"
                 width="120" alt="Product">
        </p>
    <?php endif; ?>

    <p>
        <label>Replace Image (optional)</label><br>
        <input type="file" name="image" accept=".jpg,.jpeg,.png">
    </p>

    <button type="submit">Update Product</button>
</form>

</body>
</html>
