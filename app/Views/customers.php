<!DOCTYPE html>
<html>
<head>
    <title>Customer Accounts</title>
</head>
<body>

<?= view('navbar') ?>

<h1>Customer Accounts</h1>

<p><a href="<?= base_url('/customers/new') ?>">Add New Customer</a></p>

<?php if (session()->has('error')): ?>
    <p><?= esc(session('error')) ?></p>
<?php endif; ?>

<?php if (session()->has('success')): ?>
    <p><?= esc(session('success')) ?></p>
<?php endif; ?>

<table border="1" cellpadding="8">
    <tr>
        <th>Full Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Action</th>
    </tr>

    <?php foreach ($customers as $customer): ?>
    <tr>
        <td><?= esc($customer['full_name']) ?></td>
        <td><?= esc($customer['email']) ?></td>
        <td><?= esc($customer['phone']) ?></td>
        <td>
            <a href="<?= base_url('/customers/edit/' . $customer['id']) ?>">Edit</a>

            <form action="<?= base_url('/customers/delete/' . $customer['id']) ?>"
                  method="post" style="display:inline">
                <?= csrf_field() ?>
                <button type="submit"
                        onclick="return confirm('Delete this customer?')">
                    Delete
                </button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
