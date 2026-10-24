var CART_KEY = "minishop_cart";

function getCart() {
    try {
        return JSON.parse(localStorage.getItem(CART_KEY)) || [];
    } catch (e) {
        return [];
    }
}

function saveCart(cart) {
    localStorage.setItem(CART_KEY, JSON.stringify(cart));
}

function updateCartCount() {
    var total = 0;
    getCart().forEach(function (item) {
        total += item.qty;
    });
    var el = document.getElementById("cart-count");
    if (el) {
        el.textContent = total;
    }
}

function formatPrice(n) {
    return n.toLocaleString("vi-VN") + " đ";
}

function addToCart(id, name, price) {
    var cart = getCart();
    var found = cart.find(function (item) {
        return item.id === id;
    });
    if (found) {
        found.qty += 1;
    } else {
        cart.push({ id: id, name: name, price: price, qty: 1 });
    }
    saveCart(cart);
    updateCartCount();
}

function renderCart() {
    var body = document.getElementById("cart-body");
    if (!body) {
        return;
    }
    var cart = getCart();
    var sum = 0;
    body.innerHTML = "";
    cart.forEach(function (item) {
        var line = item.price * item.qty;
        sum += line;
        var tr = document.createElement("tr");
        tr.innerHTML = "<td></td><td>" + formatPrice(item.price) + "</td><td>" +
            item.qty + "</td><td>" + formatPrice(line) + "</td>";
        tr.firstChild.textContent = item.name;
        body.appendChild(tr);
    });
    document.getElementById("cart-total").textContent = formatPrice(sum);
    var empty = cart.length === 0;
    document.getElementById("cart-empty").style.display = empty ? "block" : "none";
    document.getElementById("cart-table").style.display = empty ? "none" : "table";
    document.getElementById("clear-cart").style.display = empty ? "none" : "inline-block";
}

document.addEventListener("DOMContentLoaded", function () {
    updateCartCount();
    renderCart();

    // Thêm vào giỏ
    document.querySelectorAll(".add-to-cart").forEach(function (btn) {
        btn.addEventListener("click", function () {
            addToCart(btn.dataset.id, btn.dataset.name, Number(btn.dataset.price));
            alert("Đã thêm \"" + btn.dataset.name + "\" vào giỏ hàng");
        });
    });

    // Bài 1 + 2: nút xóa giỏ hàng, có xác nhận
    var clearBtn = document.getElementById("clear-cart");
    if (clearBtn) {
        clearBtn.addEventListener("click", function () {
            if (confirm("Xóa toàn bộ giỏ hàng?")) {
                localStorage.removeItem(CART_KEY);
                updateCartCount();
                renderCart();
            }
        });
    }

    // Bài 4: kiểm tra form liên hệ
    var form = document.getElementById("contact-form");
    if (form) {
        form.addEventListener("submit", function (e) {
            var msg = document.getElementById("message");
            var err = document.getElementById("message-error");
            if (msg.value.trim().length < 10) {
                e.preventDefault();
                err.textContent = "Nội dung tin nhắn phải có ít nhất 10 ký tự.";
                msg.focus();
            } else {
                err.textContent = "";
            }
        });
    }
});
