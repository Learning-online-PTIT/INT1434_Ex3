<?php /* Thẻ sản phẩm dùng chung cho trang chủ và "cùng danh mục". Cần biến $p. */ ?>
<article class="product-card">
    <a href="product.php?id=<?= (int)$p['id'] ?>" class="card-image">
        <img src="image/<?= e($p['image']) ?>" alt="Bìa sách <?= e($p['name']) ?>" width="200">
    </a>
    <h3><?= e($p['name']) ?></h3>
    <p class="price"><?= formatPrice($p['price']) ?></p>
    <a href="product.php?id=<?= (int)$p['id'] ?>" class="btn-detail">Xem chi tiết</a>
    <button type="button" class="add-to-cart"
            data-id="<?= (int)$p['id'] ?>"
            data-name="<?= e($p['name']) ?>"
            data-price="<?= (int)$p['price'] ?>">Thêm vào giỏ</button>
</article>
