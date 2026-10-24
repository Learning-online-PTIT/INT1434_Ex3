<?php
$pageTitle  = 'Giỏ hàng';
$activePage = 'cart.php';
require __DIR__ . '/includes/header.php';
?>
        <h2>Giỏ hàng của bạn</h2>
        <p id="cart-empty">Giỏ hàng đang trống. <a href="index.php">Tiếp tục mua sách</a></p>

        <table id="cart-table">
            <thead>
                <tr>
                    <th>Sách</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody id="cart-body"></tbody>
        </table>
        <p class="cart-total">Tổng cộng: <strong id="cart-total">0 đ</strong></p>

        <p>
            <button type="button" id="clear-cart">Xóa giỏ hàng</button>
        </p>
<?php require __DIR__ . '/includes/footer.php'; ?>
