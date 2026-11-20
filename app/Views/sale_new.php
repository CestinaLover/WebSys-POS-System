<!DOCTYPE html>
<html>
<head>
    <title>Record Sale</title>
</head>
<body>

<h1>Record Sale</h1>

<?= view('navbar') ?>

<?php if (session()->has('error')): ?>
    <p><?= esc(session('error')) ?></p>
<?php endif; ?>

<?php foreach (session('errors') ?? [] as $error): ?>
    <p><?= esc($error) ?></p>
<?php endforeach; ?>

<form action="<?= base_url('/sales/create') ?>" method="post">
    <?= csrf_field() ?>

    <p>
        <label>Product</label><br>
        <select name="product_id" required>
            <option value="">Select Product</option>

            <?php foreach ($products as $product): ?>
                <option value="<?= esc($product['id']) ?>"
                    <?= old('product_id') == $product['id'] ? 'selected' : '' ?>>
                    <?= esc($product['name']) ?>
                    - ₱<?= number_format($product['price'], 2) ?>
                    (Stock: <?= esc($product['stock_quantity']) ?>)
                </option>
            <?php endforeach; ?>
        </select>
    </p>

    <p>
        <label>Customer (Optional)</label><br>
        <select name="customer_id">
            <option value="">Walk-in Customer</option>

            <?php foreach ($customers as $customer): ?>
                <option value="<?= esc($customer['id']) ?>"
                    <?= old('customer_id') == $customer['id'] ? 'selected' : '' ?>>
                    <?= esc($customer['full_name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>

    <p>
        <label>Quantity</label><br>
        <input type="number" name="quantity" min="1"
               value="<?= esc(old('quantity', '1')) ?>" required>
    </p>

    <button type="submit">Record Sale</button>
</form>

</body>
</html>