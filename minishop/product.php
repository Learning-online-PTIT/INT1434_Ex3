<?php
require __DIR__ . '/includes/db.php';

// Lấy id từ URL và ép kiểu số nguyên; sai định dạng -> 404
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

$product = false;
if ($id !== false && $id !== null && $id > 0) {
    $stmt = $pdo->prepare(
        'SELECT p.*, c.name AS category_name
         FROM products p
         JOIN categories c ON c.id = p.category_id
         WHERE p.id = ?'
    );
    $stmt->execute([$id]);
    $product = $stmt->fetch();
}

if (!$product) {
    http_response_code(404);
    $pageTitle  = 'Không tìm thấy sản phẩm';
    $activePage = '';
    require __DIR__ . '/includes/header.php';
    echo '<h2>Không tìm thấy sản phẩm</h2>';
    echo '<p><a href="index.php">&laquo; Quay lại danh sách sách</a></p>';
    require __DIR__ . '/includes/footer.php';
    exit;
}

// ---- Bài 3: tối đa 3 sản phẩm khác cùng danh mục ----
$stmt = $pdo->prepare(
    'SELECT id, name, price, image
     FROM products
     WHERE category_id = ? AND id <> ?
     LIMIT 3'
);
$stmt->execute([$product['category_id'], $product['id']]);
$related = $stmt->fetchAll();

$pageTitle  = $product['name'];
$activePage = 'index.php';
require __DIR__ . '/includes/header.php';
?>
        <article class="product-detail">
            <h2><?= e($product['name']) ?></h2>
            <img src="image/<?= e($product['image']) ?>" alt="Bìa sách <?= e($product['name']) ?>" width="400">
            <p class="price">Giá: <strong><?= formatPrice($product['price']) ?></strong></p>
            <p><?= e($product['description']) ?></p>
            <p>
                <button type="button" class="add-to-cart"
                        data-id="<?= (int)$product['id'] ?>"
                        data-name="<?= e($product['name']) ?>"
                        data-price="<?= (int)$product['price'] ?>">Thêm vào giỏ</button>
            </p>

            <h3>Thông tin sách</h3>
            <table>
                <thead>
                    <tr>
                        <th>Thông tin</th>
                        <th>Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tác giả</td>
                        <td><?= e($product['author']) ?></td>
                    </tr>
                    <tr>
                        <td>Thể loại</td>
                        <td><?= e($product['category_name']) ?></td>
                    </tr>
                    <tr>
                        <td>Ngôn ngữ</td>
                        <td>Tiếng Việt</td>
                    </tr>
                    <tr>
                        <td>Giá bìa</td>
                        <td><?= formatPrice($product['price']) ?></td>
                    </tr>
                </tbody>
            </table>

            <p><a href="index.php">&laquo; Quay lại danh sách sách</a></p>
        </article>

        <!-- Bài 3: sản phẩm cùng danh mục -->
        <section class="related">
            <h2>Sản phẩm cùng danh mục</h2>
            <?php if (count($related) === 0): ?>
                <p>Chưa có sản phẩm nào khác cùng danh mục.</p>
            <?php else: ?>
                <div class="product-list">
                    <?php foreach ($related as $p): ?>
                        <?php require __DIR__ . '/includes/product_card.php'; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </section>
<?php require __DIR__ . '/includes/footer.php'; ?>
