<!DOCTYPE html>
<html>
<head>
    <title>Edit Staff</title>
</head>
<body>

<?= view('navbar') ?>

<h1>Edit Staff</h1>

<?php foreach (session('errors') ?? [] as $error): ?>
    <p><?= esc($error) ?></p>
<?php endforeach; ?>

<form action="<?= base_url('/users/update/' . $user['id']) ?>"
      method="post" enctype="multipart/form-data">

    <?= csrf_field() ?>

    <p>
        <label>Username</label><br>
        <input type="text" name="username"
               value="<?= esc(old('username', $user['username'])) ?>" required>
    </p>

    <p>
        <label>Full Name</label><br>
        <input type="text" name="full_name"
               value="<?= esc(old('full_name', $user['full_name'])) ?>" required>
    </p>

    <p>
        <label>New Password (leave blank to keep current password)</label><br>
        <input type="password" name="password" minlength="8">
    </p>

    <p>
        <label>Avatar (JPG/PNG, max 2MB)</label><br>
        <input type="file" name="avatar" accept=".jpg,.jpeg,.png">
    </p>

    <?php if (! empty($user['avatar'])): ?>
        <p>
            <img src="<?= base_url('uploads/avatars/' . $user['avatar']) ?>"
                 width="120" alt="Current Avatar">
        </p>
    <?php endif; ?>

    <button type="submit">Update Staff</button>
</form>

</body>
</html>
