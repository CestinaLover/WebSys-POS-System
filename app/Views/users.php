<!DOCTYPE html>
<html>
<head>
    <title>User Accounts</title>
</head>
<body>

<?= view('navbar') ?>

<h1>Staff Accounts</h1>

<p><a href="<?= base_url('/users/new') ?>">Add New Staff</a></p>

<?php if (session()->has('error')): ?>
    <p><?= esc(session('error')) ?></p>
<?php endif; ?>

<?php if (session()->has('success')): ?>
    <p><?= esc(session('success')) ?></p>
<?php endif; ?>

<table border="1" cellpadding="8">
    <tr>
        <th>Avatar</th>
        <th>Username</th>
        <th>Full Name</th>
        <th>Created At</th>
        <th>Action</th>
    </tr>

    <?php foreach ($users as $user): ?>
    <tr>
        <td>
            <?php if (! empty($user['avatar'])): ?>
                <img src="<?= base_url('uploads/avatars/' . $user['avatar']) ?>"
                     width="70" height="70" alt="Avatar">
            <?php else: ?>
                No Avatar
            <?php endif; ?>
        </td>
        <td><?= esc($user['username']) ?></td>
        <td><?= esc($user['full_name']) ?></td>
        <td><?= esc($user['created_at']) ?></td>
        <td>
            <a href="<?= base_url('/users/edit/' . $user['id']) ?>">Edit</a>

            <form action="<?= base_url('/users/delete/' . $user['id']) ?>"
                  method="post" style="display:inline">
                <?= csrf_field() ?>
                <button type="submit"
                        onclick="return confirm('Delete this staff account?')">
                    Delete
                </button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
