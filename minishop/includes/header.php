<?php
require_once __DIR__ . '/functions.php';

// Biến dùng chung: $pageTitle (tiêu đề tab), $activePage (mục menu đang chọn)
$pageTitle  = $pageTitle  ?? 'Hiệu sách của Dread';
$activePage = $activePage ?? '';

function navLink($file, $label, $activePage) {
    $cls = ($activePage === $file) ? ' class="active"' : '';
    return '<a href="' . $file . '"' . $cls . '>' . $label . '</a>';
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($pageTitle) ?> - Hiệu sách của Dread</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/main.js" defer></script>
</head>
<body>
    <!-- ĐẦU TRANG -->
    <header class="site-header">
        <h1>Hiệu sách của Dread</h1>
        <nav class="main-nav">
            <?= navLink('index.php', 'Trang chủ', $activePage) ?>
            <?= navLink('about.php', 'Giới thiệu', $activePage) ?>
            <?= navLink('contact.php', 'Liên hệ', $activePage) ?>
            <?= navLink('login.php', 'Đăng nhập', $activePage) ?>
            <?= navLink('register.php', 'Đăng ký', $activePage) ?>
            <a href="cart.php"<?= $activePage === 'cart.php' ? ' class="active"' : '' ?>>Giỏ hàng (<span id="cart-count">0</span>)</a>
        </nav>
    </header>

    <!-- NỘI DUNG CHÍNH -->
    <main>
