<?php
$pageTitle  = 'Liên hệ';
$activePage = 'contact.php';
require __DIR__ . '/includes/header.php';
?>
        <h2>Liên hệ với chúng tôi</h2>

        <form id="contact-form" action="contact.php" method="get" class="form">
            <p>
                <label for="name">Họ và tên</label><br>
                <input type="text" id="name" name="name" required placeholder="Nguyễn Văn An">
            </p>
            <p>
                <label for="email">Email</label><br>
                <input type="email" id="email" name="email" required placeholder="ten@example.com">
            </p>
            <p>
                <label for="message">Nội dung tin nhắn</label><br>
                <textarea id="message" name="message" rows="5" cols="40"></textarea><br>
                <span id="message-error" class="error"></span>
            </p>
            <p>
                <button type="submit">Gửi tin nhắn</button>
            </p>
        </form>
<?php require __DIR__ . '/includes/footer.php'; ?>
