<!DOCTYPE html>
<html>
<head>
    <title>Sales History</title>
</head>
<body>

<h1>Sales History</h1>

<?= view('navbar') ?>

<?php if (session()->has('success')): ?>
    <p><?= esc(session('success')) ?></p>
<?php endif; ?>

<p>
    <a href="<?= base_url('/sales/new') ?>">Record New Sale</a>
</p>

<table border="1" cellpadding="8">
    <tr>
        <th>Product</th>
        <th>Customer</th>
        <th>Staff</th>
        <th>Quantity</th>
        <th>Total Price</th>
        <th>Date</th>
    </tr>

    <?php foreach ($sales as $sale): ?>
    <tr>
        <td><?= esc($sale['product_name']) ?></td>
        <td><?= esc($sale['customer_name'] ?? 'Walk-in Customer') ?></td>
        <td><?= esc($sale['staff_name']) ?></td>
        <td><?= esc($sale['quantity']) ?></td>
        <td>₱<?= number_format($sale['total_price'], 2) ?></td>
        <td><?= esc($sale['created_at']) ?></td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>