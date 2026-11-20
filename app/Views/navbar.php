<nav>
    <a href="<?= base_url('/') ?>">Home</a>
    <a href="<?= base_url('/about') ?>">About</a>
    <a href="<?= base_url('/customers') ?>">Customers</a>
    <a href="<?= base_url('/users') ?>">Staff</a>
    <a href="<?= base_url('/products') ?>">Products</a>

    <?php if (session()->get('isLoggedIn')): ?>
        <a href="<?= base_url('/logout') ?>">Logout</a>
    <?php else: ?>
        <a href="<?= base_url('/login') ?>">Login</a>
    <?php endif; ?>
</nav>
