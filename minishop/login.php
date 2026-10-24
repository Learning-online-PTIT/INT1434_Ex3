<?php
$pageTitle  = 'Đăng nhập';
$activePage = 'login.php';
require __DIR__ . '/includes/header.php';
?>
        <h2>Đăng nhập</h2>

        <form action="login.php" method="get" class="form">
            <p>
                <label for="email">Email</label><br>
                <input type="email" id="email" name="email" required placeholder="ten@example.com">
            </p>
            <p>
                <label for="password">Mật khẩu</label><br>
                <input type="password" id="password" name="password" required minlength="6">
            </p>
            <p>
                <button type="submit">Đăng nhập</button>
            </p>
        </form>
        <p>Chưa có tài khoản? <a href="register.php">Đăng ký ngay</a></p>
<?php require __DIR__ . '/includes/footer.php'; ?>
