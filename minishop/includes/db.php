<?php
require_once __DIR__ . '/functions.php';

// Kết nối CSDL bằng PDO. Mặc định theo XAMPP: user root, mật khẩu rỗng.
$dbHost = 'localhost';
$dbName = 'minishop';
$dbUser = 'root';
$dbPass = '';

try {
    $pdo = new PDO(
        "mysql:host=$dbHost;dbname=$dbName;charset=utf8mb4",
        $dbUser,
        $dbPass,
        [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ]
    );
} catch (PDOException $e) {
    http_response_code(500);
    exit('Không kết nối được CSDL. Hãy import minishop.sql vào phpMyAdmin và kiểm tra includes/db.php.');
}
