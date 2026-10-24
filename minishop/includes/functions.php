<?php
// Hàm tiện ích dùng chung cho mọi trang

// Escape HTML để chống XSS khi in dữ liệu ra trang
function e($s) {
    return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8');
}

// 85000 -> "85.000 đ"
function formatPrice($n) {
    return number_format((int)$n, 0, ',', '.') . ' đ';
}
