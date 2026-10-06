<!DOCTYPE html>
<html>
<head>
    <title>POS System</title>
</head>
<body>

    <h1>POS System is working!</h1>

<nav>
    <a href="<?= base_url('/') ?>">Home</a> |
    <a href="<?= base_url('/about') ?>">About</a> |
    <a href="<?= base_url('/customers') ?>">Customer Accounts</a> |
    <a href="<?= base_url('/users') ?>">User Accounts</a> |

    <?php if (session()->get('isLoggedIn')): ?>
        <a href="<?= base_url('/logout') ?>">Logout</a>
    <?php else: ?>
        <a href="<?= base_url('/login') ?>">Login</a>
    <?php endif; ?>
</nav>

</body>
</html>