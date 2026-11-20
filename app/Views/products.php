<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
</head>
<body>

<h1>Product Management</h1>

<?= view('navbar') ?>

<p><a href="<?= base_url('/products/new') ?>">Add Product</a></p>

<?php if (session()->has('error')): ?>
    <p><?= esc(session('error')) ?></p>
<?php endif; ?>

<table border="1" cellpadding="8">
    <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Action</th>
    </tr>

    <?php foreach ($products as $product): ?>
    <tr>
        <td>
            <?php if (! empty($product['image'])): ?>
                <img src="<?= base_url('uploads/products/' . $product['image']) ?>"
                     width="80" alt="Product">
            <?php else: ?>
                No Image
            <?php endif; ?>
        </td>
        <td><?= esc($product['name']) ?></td>
        <td>₱<?= number_format($product['price'], 2) ?></td>
        <td><?= esc($product['stock_quantity']) ?></td>
        <td>
            <a href="<?= base_url('/products/edit/' . $product['id']) ?>">Edit</a>

            <form action="<?= base_url('/products/delete/' . $product['id']) ?>"
                  method="post" style="display:inline">
                <?= csrf_field() ?>
                <button type="submit"
                        onclick="return confirm('Delete this product?')">
                    Delete
                </button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
