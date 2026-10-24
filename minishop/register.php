<?php
$pageTitle  = 'Đăng ký';
$activePage = 'register.php';
require __DIR__ . '/includes/header.php';
?>
        <h2>Đăng ký tài khoản</h2>

        <form action="register.php" method="get" class="form">
            <p>
                <label for="fullname">Họ và tên</label><br>
                <input type="text" id="fullname" name="fullname"
                       required minlength="2" maxlength="100" placeholder="Nguyễn Văn An">
            </p>
            <p>
                <label for="email">Email</label><br>
                <input type="email" id="email" name="email"
                       required placeholder="ten@example.com">
            </p>
            <p>
                <label for="password">Mật khẩu</label><br>
                <input type="password" id="password" name="password"
                       required minlength="6">
            </p>
            <p>
                <label for="password2">Nhập lại mật khẩu</label><br>
                <input type="password" id="password2" name="password2"
                       required minlength="6">
            </p>
            <p>
                <label for="phone">Số điện thoại</label><br>
                <input type="tel" id="phone" name="phone"
                       required pattern="0[0-9]{9}" placeholder="0900000000"
                       title="Số điện thoại gồm 10 chữ số, bắt đầu bằng số 0">
            </p>
            <p>
                Giới tính<br>
                <input type="radio" id="male" name="gender" value="male">
                <label for="male">Nam</label>
                <input type="radio" id="female" name="gender" value="female">
                <label for="female">Nữ</label>
            </p>
            <p>
                <label for="province">Tỉnh / Thành phố</label><br>
                <select id="province" name="province">
                    <option value="">-- Chọn --</option>
                    <option value="tuyen-quang">Tuyên Quang</option>
                    <option value="cao-bang">Cao Bằng</option>
                    <option value="lao-cai">Lào Cai</option>
                    <option value="lai-chau">Lai Châu</option>
                    <option value="dien-bien">Điện Biên</option>
                    <option value="son-la">Sơn La</option>
                    <option value="lang-son">Lạng Sơn</option>
                    <option value="quang-ninh">Quảng Ninh</option>
                    <option value="thai-nguyen">Thái Nguyên</option>
                    <option value="phu-tho">Phú Thọ</option>
                    <option value="bac-ninh">Bắc Ninh</option>
                    <option value="hung-yen">Hưng Yên</option>
                    <option value="hai-phong">Hải Phòng</option>
                    <option value="ninh-binh">Ninh Bình</option>
                    <option value="ha-noi">Hà Nội</option>
                    <option value="thanh-hoa">Thanh Hóa</option>
                    <option value="nghe-an">Nghệ An</option>
                    <option value="ha-tinh">Hà Tĩnh</option>
                    <option value="quang-tri">Quảng Trị</option>
                    <option value="hue">Huế</option>
                    <option value="da-nang">Đà Nẵng</option>
                    <option value="quang-ngai">Quảng Ngãi</option>
                    <option value="gia-lai">Gia Lai</option>
                    <option value="dak-lak">Đắk Lắk</option>
                    <option value="khanh-hoa">Khánh Hòa</option>
                    <option value="lam-dong">Lâm Đồng</option>
                    <option value="dong-nai">Đồng Nai</option>
                    <option value="tay-ninh">Tây Ninh</option>
                    <option value="tp-ho-chi-minh">Thành phố Hồ Chí Minh</option>
                    <option value="dong-thap">Đồng Tháp</option>
                    <option value="vinh-long">Vĩnh Long</option>
                    <option value="can-tho">Cần Thơ</option>
                    <option value="an-giang">An Giang</option>
                    <option value="ca-mau">Cà Mau</option>
                </select>
            </p>
            <p>
                <label for="address">Địa chỉ nhận sách</label><br>
                <textarea id="address" name="address" rows="3" cols="40"></textarea>
            </p>
            <p>
                <input type="checkbox" id="agree" name="agree" value="1" required>
                <label for="agree">Tôi đồng ý với điều khoản sử dụng</label>
            </p>
            <p>
                <button type="submit">Đăng ký</button>
            </p>
        </form>
<?php require __DIR__ . '/includes/footer.php'; ?>
