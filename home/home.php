<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Mistine – Chăm chút từng nét đẹp</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Montserrat', Arial, sans-serif; background: #f7f8fa; margin: 0; }
        .header-bar {
            width: 100vw;
            background: linear-gradient(90deg, #2f80ed 0%, #56ccf2 100%);
            height: 6px;
        }
        .header {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 4px 24px #e3e8f0;
            padding: 0 48px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 80px;
            margin: 0 auto 32px auto;
            max-width: 1200px;
            position: relative;
            top: 0;
        }
        .header .logo {
            font-size: 2.2rem;
            color: #2f80ed;
            font-weight: bold;
            letter-spacing: 1px;
            margin-right: 36px;
        }
        .header nav {
            display: flex;
            gap: 36px;
            align-items: center;
            flex: 1;
            justify-content: center;
        }
        .header nav a {
            color: #222;
            text-decoration: none;
            font-size: 1.1rem;
            font-weight: 600;
            transition: color 0.2s, background 0.2s;
            border-radius: 8px;
            padding: 8px 18px;
            display: flex;
            align-items: center;
        }
        .header nav a:hover {
            color: #fff;
            background: #2f80ed;
        }
        .header .actions {
            display: flex;
            align-items: center;
            gap: 18px;
        }
        .header .icon-btn {
            background: #fff;
            border: 1.5px solid #e3e8f0;
            border-radius: 50%;
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            color: #222;
            transition: box-shadow 0.2s, border 0.2s;
            cursor: pointer;
            position: relative;
        }
        .header .icon-btn:hover {
            box-shadow: 0 2px 8px #b3c6e0;
            border: 1.5px solid #1976d2;
        }
        .person-dropdown {
            position: absolute;
            top: 54px;
            right: 0;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 24px #e3e8f0;
            min-width: 180px;
            z-index: 100;
            padding: 18px 0 12px 0;
            display: none;
        }
        .person-dropdown a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 28px;
            color: #222;
            text-decoration: none;
            font-weight: 400;
            font-size: 0.98rem;
            transition: background 0.2s, color 0.2s;
        }
        .person-dropdown a:hover {
            background: #f0f4fa;
            color: #1976d2;
        }
        .icon-btn.person-active .person-dropdown {
            display: block;
        }
        @media (max-width: 900px) {
            .header { max-width: 100vw; padding: 0 8px; }
            .header nav { gap: 10px; }
            .header .logo { font-size: 1.3rem; margin-right: 10px; }
            .footer .footer-content { flex-direction: column; gap: 18px; align-items: flex-start; }
        }
        .hero { position: relative; width: 100%; min-height: 420px; background: #fff; border-radius: 24px; overflow: hidden; margin: 0 auto 36px auto; max-width: 1200px; box-shadow: 0 4px 24px #e3e8f0; }
        .hero img { width: 100%; height: 420px; object-fit: cover; filter: brightness(0.7); }
        .hero-content { position: absolute; top: 0; left: 0; width: 100%; height: 100%; display: flex; flex-direction: column; justify-content: center; align-items: flex-start; padding: 60px 80px; background: rgba(0,0,0,0.18); }
        .hero-title { font-size: 3rem; font-weight: bold; color: #fff; margin-bottom: 18px; text-shadow: 0 2px 8px #0002; }
        .hero-desc { font-size: 1.25rem; color: #f0f0f0; margin-bottom: 32px; max-width: 520px; text-shadow: 0 2px 8px #0002; }
        .hero-btn { background: #2f80ed; color: #fff; padding: 14px 38px; border: none; border-radius: 10px; font-size: 1.15rem; font-weight: 700; cursor: pointer; transition: background 0.2s; box-shadow: 0 2px 8px #b3c6e0; }
        .hero-btn:hover { background: #1253a2; }
        .section-title {
            text-align: center;
            font-size: 2.1rem;
            font-weight: bold;
            margin: 48px auto 32px auto;
            color: #222;
            letter-spacing: 1px;
        }
        .product-list { display: flex; gap: 32px; justify-content: flex-start; flex-wrap: wrap; margin-left: 60px; }
        .product-card { background: #fff; border-radius: 18px; box-shadow: 0 2px 12px #e3e8f0; padding: 18px 18px 12px 18px; width: 220px; display: flex; flex-direction: column; align-items: center; position: relative; transition: box-shadow 0.2s, transform 0.2s; }
        .product-card:hover { box-shadow: 0 8px 32px #b3c6e0; transform: translateY(-6px) scale(1.03); }
        .product-card img { width: 160px; height: 140px; object-fit: cover; border-radius: 12px; margin-bottom: 12px; }
        .product-card .fav { position: absolute; top: 16px; right: 16px; color: #222; font-size: 1.2rem; background: #fff; border-radius: 50%; width: 28px; height: 28px; display: flex; align-items: center; justify-content: center; box-shadow: 0 2px 8px #e3e8f0; }
        .product-card .prod-name { font-size: 1.15rem; font-weight: 700; margin-bottom: 4px; color: #222; }
        .product-card .prod-rating { color: #f7b500; font-size: 1rem; margin-bottom: 4px; }
        .product-card .prod-price { color: #2f80ed; font-size: 1.15rem; font-weight: bold; }
        .features { display: flex; justify-content: center; gap: 64px; margin: 56px 0 0 0; }
        .feature { text-align: center; }
        .feature-icon { font-size: 2.2rem; color: #2f80ed; margin-bottom: 10px; }
        .feature-title { font-weight: 600; margin-bottom: 6px; }
        .footer { background: #181d2a; color: #fff; padding: 48px 0 0 0; margin-top: 64px; }
        .footer .footer-content { display: flex; justify-content: space-around; flex-wrap: wrap; gap: 32px; }
        .footer .footer-col { min-width: 200px; }
        .footer .footer-logo { font-size: 2rem; font-weight: bold; color: #fff; margin-bottom: 18px; }
        .footer .footer-title { font-weight: 600; margin-bottom: 10px; }
        .footer .footer-link { color: #fff; text-decoration: none; display: block; margin-bottom: 6px; opacity: 0.85; }
        .footer .footer-link:hover { text-decoration: underline; opacity: 1; }
        .footer .footer-contact { font-size: 1rem; margin-bottom: 6px; }
        .footer .footer-social { margin-top: 12px; }
        .footer .footer-social a { color: #fff; font-size: 1.3rem; margin-right: 12px; opacity: 0.8; }
        .footer .footer-social a:hover { opacity: 1; }
        .footer .copyright { text-align: center; color: #aaa; font-size: 0.95rem; margin: 32px 0 0 0; padding-bottom: 18px; }
        .buy-btn {
            margin-top: 10px;
            background: #2f80ed;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 24px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s, box-shadow 0.2s;
            box-shadow: 0 2px 8px #e3e8f0;
        }
        .buy-btn:hover {
            background: #1253a2;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans">
    <div class="header-bar"></div>
    <div class="main-content" style="padding-top:0;">
        <!-- Header -->
        <header class="header">
            <div class="logo" style="font-family:'Pacifico',cursive;">Mistine</div>
            <nav>
                <a href="#">Trang chủ</a>
                <a href="#">Giới thiệu</a>
                <a href="#">Sản phẩm</a>
                <a href="#">Liên hệ</a>
            </nav>
            <div class="actions">
                <form style="position:relative;">
                    <input type="text" id="search-input" placeholder="Tìm kiếm sản phẩm..." style="padding:8px 40px 8px 36px;border-radius:24px;border:1.5px solid #e3e8f0;outline:none;width:180px;font-size:1rem;background:#fafbfc;">
                    <i class="bi bi-search" style="position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#888;font-size:1.1rem;"></i>
                </form>
                <a href="#" class="icon-btn"><i class="bi bi-cart"></i></a>
                <div id="person-btn" class="icon-btn">
                    <i class="bi bi-person"></i>
                    <div id="person-dropdown" class="person-dropdown">
                        <a href="index.php?controller=account&action=login"><i class="bi bi-box-arrow-in-right"></i> Đăng nhập</a>
                        <a href="index.php?controller=account&action=register"><i class="bi bi-person-plus"></i> Đăng ký</a>
                    </div>
                </div>
            </div>
        </header>

    <!-- Banner -->
    <div class="hero">
        <img src="https://scontent-sin6-1.xx.fbcdn.net/v/t39.30808-6/480689695_2331467593913039_2575179576895762123_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=f727a1&_nc_eui2=AeFJdE0MndOFqiBaFsWC9SrTESdj9SVHKZIRJ2P1JUcpkh-G0ZHXXJLHbLae3iH62y1heqX1yRmkNBUTTsrHGwGQ&_nc_ohc=4MjCedkOtIAQ7kNvwFdTgGJ&_nc_oc=Adk-k-X5SmNC7lu37orWN39C1jsHBW7IMvEZvbVQxN5o5q9msPyJ8xUn9Np40z27sBw4YnwxIZ60lc064ladBe0p&_nc_zt=23&_nc_ht=scontent-sin6-1.xx&_nc_gid=NHBLY58yHVVBkWbCWlsTYA&oh=00_AfMjFeLDZ0EhMrH7YfJ9r13aYh0WXb6vjIAHKNJqj3vCbA&oe=68608DAD" alt="Banner">
        <div class="hero-content">
            <div class="hero-title">Đánh thức vẻ đẹp tiềm ẩn trong bạn</div>
            <div class="hero-desc">Mỗi người phụ nữ đều có nét đẹp riêng. Mistine giúp bạn khơi dậy sự quyến rũ và thần thái riêng biệt bằng những sản phẩm phù hợp và chất lượng.</div>
            <button class="hero-btn">Khám phá ngay</button>
        </div>
    </div>

    <!-- Sản phẩm nổi bật -->
    <div class="section-title">Best Seller</div>
    <div class="product-list" style="justify-content:center;max-width:1200px;margin:0 auto 48px auto;gap:32px;flex-wrap:wrap;">
        <?php foreach ($products as $prod): ?>
            <div class="product-card">
                <span class="fav"><i class="bi bi-heart"></i></span>
                <img src="uploads/<?= htmlspecialchars($prod['image']) ?>" alt="<?= htmlspecialchars($prod['name']) ?>">
                <div class="prod-name"><?= htmlspecialchars($prod['name']) ?></div>
                <?php if (isset($prod['rating'])): ?>
                    <div class="prod-rating">
                        <?php for ($i = 0; $i < 5; $i++): ?>
                            <i class="bi bi-star<?= $i < $prod['rating'] ? '-fill' : '' ?>"></i>
                        <?php endfor; ?>
                        <span style="color:#888;">(<?= $prod['review_count'] ?? 0 ?>)</span>
                    </div>
                <?php endif; ?>
                <div class="prod-price"><?= number_format($prod['price'], 0, ',', '.') ?>₫</div>
                <button class="buy-btn">Mua ngay</button>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Tất cả sản phẩm -->
    <div class="section-title">Tất Cả Sản Phẩm</div>
    <div style="margin-bottom:32px; display:flex;margin-left:200px; align-items:center;">
        <form method="get">
            <input type="hidden" name="controller" value="home">
            <input type="hidden" name="action" value="modernHome">
            <select id="category-filter" name="category_id" style="padding:10px 18px;border-radius:8px;border:1px solid #ccc;min-width:220px;">
                <option value="">Tất cả sản phẩm</option>
                <?php foreach ($categories as $cat): ?>
                    <option value="<?= $cat['id'] ?>"><?= htmlspecialchars($cat['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </form>
    </div>
    <div class="product-list" id="product-list" style="justify-content:center;max-width:1200px;margin:0 auto 48px auto;gap:32px;flex-wrap:wrap;">
        <?php foreach ($allProducts as $prod): ?>
            <div class="product-card" data-category="<?= $prod['category_id'] ?>">
                <span class="fav"><i class="bi bi-heart"></i></span>
                <img src="uploads/<?= htmlspecialchars($prod['image']) ?>" alt="<?= htmlspecialchars($prod['name']) ?>">
                <div class="prod-name"><?= htmlspecialchars($prod['name']) ?></div>
                <div class="prod-price"><?= number_format($prod['price'], 0, ',', '.') ?>₫</div>
                <button class="buy-btn">Mua ngay</button>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Dịch vụ nổi bật -->
    <div class="features" style="display:flex;justify-content:center;gap:64px;margin:56px auto 0 auto;max-width:1200px;">
        <div class="feature">
            <div class="feature-icon"><i class="bi bi-truck"></i></div>
            <div class="feature-title">Miễn Phí Vận Chuyển</div>
            <div>Miễn phí vận chuyển cho đơn hàng từ 10 triệu</div>
        </div>
        <div class="feature">
            <div class="feature-icon"><i class="bi bi-shield-check"></i></div>
            <div class="feature-title">Cam kết chính hãng</div>
            <div>Sản phẩm 100% chính hãng, có hóa đơn đầy đủ</div>
        </div>
        <div class="feature">
            <div class="feature-icon"><i class="bi bi-headset"></i></div>
            <div class="feature-title">Hỗ Trợ 24/7</div>
            <div>Đội ngũ tư vấn chuyên nghiệp</div>
        </div>
    </div>

    <!-- Section 7: Contact Form (2 columns modern) -->
    <section class="py-12 bg-gray-100" style="justify-content:center; margin-top:64px;">
        <div style="max-width:1100px;margin:0 auto;display:flex;flex-wrap:wrap;gap:48px;align-items:center;justify-content:center;">
            <div style="min-width:320px;max-width:480px;background:#fff;padding:40px 32px;border-radius:18px;box-shadow:0 2px 12px #e3e8f0;">
                <h2 style="font-size:1.7rem;font-weight:bold;color:#2f80ed;margin-bottom:18px;">Liên Hệ Với Chúng Tôi</h2>
                <form method="post" action="index.php?controller=contact&action=submit">
                    <div style="margin-bottom:18px;">
                        <label for="name" style="display:block;color:#333;font-weight:600;margin-bottom:6px;">Họ và Tên</label>
                        <input type="text" id="name" name="name" required style="width:90%;padding:10px 16px;border-radius:8px;border:1.5px solid #2f80ed;font-size:1rem;outline:none;">
                    </div>
                    <div style="margin-bottom:18px;">
                        <label for="email" style="display:block;color:#333;font-weight:600;margin-bottom:6px;">Email</label>
                        <input type="email" id="email" name="email" required style="width:90%;padding:10px 16px;border-radius:8px;border:1.5px solid #2f80ed;font-size:1rem;outline:none;">
                    </div>
                    <div style="margin-bottom:18px;">
                        <label for="message" style="display:block;color:#333;font-weight:600;margin-bottom:6px;">Tin Nhắn</label>
                        <textarea id="message" name="message" required style="width:90%;padding:10px 16px;border-radius:8px;border:1.5px solid #2f80ed;font-size:1rem;outline:none;min-height:100px;"></textarea>
                    </div>
                    <button type="submit" style="width:100%;background:#2f80ed;color:#fff;padding:14px 0;border:none;border-radius:8px;font-size:1.1rem;font-weight:600;cursor:pointer;box-shadow:0 2px 8px #e3e8f0;transition:background 0.2s;">Gửi Liên Hệ</button>
                </form>
            </div>
            <div style="flex:1 1 420px;min-width:320px;max-width:520px;display:flex;align-items:center;justify-content:center;">
                <div style="width:100%;background:#fff;border-radius:22px;box-shadow:0 4px 24px #e3e8f0;padding:18px 18px 10px 18px;">
                    <iframe src="https://www.google.com/maps?q=Hà+Đông,+Hà+Nội&output=embed" width="100%" height="340" style="border-radius:16px;border:2px solid #2f80ed;min-width:220px;box-shadow:0 2px 12px #e3e8f0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer" style="background:#222846;color:#fff;padding:48px 0 0 0;margin-top:64px;">
        <div class="footer-content" style="display:flex;justify-content:space-between;flex-wrap:wrap;gap:32px;max-width:1200px;margin:0 auto;">
            <div style="flex:1 1 320px;min-width:260px;max-width:400px;display:flex;flex-direction:column;gap:18px;">
                <div class="footer-logo" style="font-size:2rem;font-weight:bold;color:#fff;margin-bottom:8px;">Mistine</div>
                <div style="opacity:0.85;line-height:1.6;">Trang điểm không chỉ để đẹp hơn, mà còn để yêu bản thân nhiều hơn. Mistine đồng hành cùng bạn trên hành trình chăm sóc vẻ đẹp và sự tự tin mỗi ngày.</div>
            </div>
            <div style="flex:1 1 180px;min-width:160px;max-width:220px;display:flex;flex-direction:column;gap:8px;">
                <div class="footer-title" style="font-weight:700;margin-bottom:10px;font-size:1.1rem;">Thông Tin</div>
                <a href="#" class="footer-link" style="color:#fff;text-decoration:none;display:block;margin-bottom:4px;opacity:0.85;">Về chúng tôi</a>
                <a href="#" class="footer-link" style="color:#fff;text-decoration:none;display:block;margin-bottom:4px;opacity:0.85;">Chính sách bảo mật</a>
                <a href="#" class="footer-link" style="color:#fff;text-decoration:none;display:block;margin-bottom:4px;opacity:0.85;">Điều khoản dịch vụ</a>
                <a href="#" class="footer-link" style="color:#fff;text-decoration:none;display:block;margin-bottom:4px;opacity:0.85;">Chính sách đổi trả</a>
            </div>
            <div style="flex:1 1 220px;min-width:180px;max-width:300px;display:flex;flex-direction:column;gap:8px;">
                <div class="footer-title" style="font-weight:700;margin-bottom:10px;font-size:1.1rem;">Liên Hệ</div>
                <div class="footer-contact" style="font-size:1rem;margin-bottom:4px;display:flex;align-items:center;gap:8px;"><i class="bi bi-geo-alt"></i> <span>Trần Phú, Hà Đông, Hà Nội</span></div>
                <div class="footer-contact" style="font-size:1rem;margin-bottom:4px;display:flex;align-items:center;gap:8px;"><i class="bi bi-telephone"></i> <span>0123 456 789</span></div>
                <div class="footer-contact" style="font-size:1rem;margin-bottom:4px;display:flex;align-items:center;gap:8px;"><i class="bi bi-envelope"></i> <span>mistinecosmetics@gmail.com</span></div>
            </div>
        </div>
        <div class="copyright" style="text-align:center;color:#aaa;font-size:0.95rem;margin:32px 0 0 0;padding-bottom:18px;opacity:0.7;">
            © 2025 My Shop. Tất cả quyền được bảo lưu.
        </div>
    </footer>

    <script>
    document.getElementById('category-filter').addEventListener('change', function() {
        var selected = this.value;
        var cards = document.querySelectorAll('#product-list .product-card');
        cards.forEach(function(card) {
            if (!selected || card.getAttribute('data-category') === selected) {
                card.style.display = '';
            } else {
                card.style.display = 'none';
            }
        });
    });

    // Dropdown đăng nhập/tài khoản
    const personBtn = document.getElementById('person-btn');
    const personDropdown = document.getElementById('person-dropdown');
    document.addEventListener('click', function(e) {
        if (personBtn.contains(e.target)) {
            personBtn.classList.toggle('person-active');
        } else {
            personBtn.classList.remove('person-active');
        }
    });

    </script>
</body>
</html>
