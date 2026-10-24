<?php
require __DIR__ . '/includes/db.php';

// ---- Bài 1: Sắp xếp theo giá ----
// Tên cột và chiều sắp xếp KHÔNG truyền được qua dấu ? (placeholder chỉ dành cho giá trị),
// nên dùng if để chọn một trong các chuỗi ORDER BY viết sẵn.
// Tuyệt đối không ghép trực tiếp $_GET['sort'] vào câu SQL.
$sort = $_GET['sort'] ?? '';

if ($sort === 'price_asc') {
    $orderBy = 'ORDER BY price ASC, id ASC';
} elseif ($sort === 'price_desc') {
    $orderBy = 'ORDER BY price DESC, id ASC';
} else {
    $sort    = '';                 // giá trị lạ -> về mặc định
    $orderBy = 'ORDER BY id ASC';
}

$stmt = $pdo->prepare("SELECT id, name, price, image FROM products $orderBy");
$stmt->execute();
$products = $stmt->fetchAll();

$pageTitle  = 'Trang chủ';
$activePage = 'index.php';
require __DIR__ . '/includes/header.php';
?>
        <section>
            <h2>Sách nổi bật</h2>

            <!-- Bài 1: liên kết sắp xếp -->
            <p class="sort-bar">
                Sắp xếp:
                <a href="index.php"<?= $sort === '' ? ' class="current"' : '' ?>>Mặc định</a> |
                <a href="index.php?sort=price_asc"<?= $sort === 'price_asc' ? ' class="current"' : '' ?>>Giá tăng dần</a> |
                <a href="index.php?sort=price_desc"<?= $sort === 'price_desc' ? ' class="current"' : '' ?>>Giá giảm dần</a>
            </p>

            <!-- Bài 2: đếm kết quả -->
            <p class="result-count">Tìm thấy <strong><?= count($products) ?></strong> sản phẩm</p>

            <div class="product-list">
                <?php foreach ($products as $p): ?>
                    <?php require __DIR__ . '/includes/product_card.php'; ?>
                <?php endforeach; ?>
            </div>
        </section>
<?php require __DIR__ . '/includes/footer.php'; ?>
