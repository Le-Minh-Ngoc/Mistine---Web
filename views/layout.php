<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản trị sản phẩm</title>
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body { font-family: 'Montserrat', Arial, sans-serif; font-size: 16px; background: #f7f7f7; }
        .sidebar, .sidebar .logo, .sidebar nav a, .sidebar .section-title, .main-content, header, .user-info, .user-info .name, .user-info .role, main, .sidebar a i {
            font-family: 'Montserrat', Arial, sans-serif;
        }
        .sidebar .logo, .sidebar .section-title, .user-info .name, header {
            font-weight: bold;
        }
        .sidebar {
            width: 260px; background: #fff; height: 100vh; position: fixed; left: 0; top: 0; border-right: 1px solid #eee; padding: 0; z-index: 10;
        }
        .sidebar .logo {height: 60px; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 22px; color: #2f80ed;}
        .sidebar nav {padding: 0 0 20px 0;}
        .sidebar nav a {display: block; padding: 12px 32px; color: #222; text-decoration: none; font-size: 16px; border-left: 3px solid transparent; transition: 0.2s;}
        .sidebar nav a.active, .sidebar nav a:hover {background: #f4f8fb; color: #2f80ed; border-left: 3px solid #2f80ed;}
        .sidebar .section-title {padding: 10px 32px 2px 32px; color: #888; font-size: 13px; text-transform: uppercase; letter-spacing: 1px;}
        .main-content {margin-left: 260px; min-height: 100vh; background: #f7f7f7;}
        header {background: #fff; color: #222; padding: 16px 32px; border-bottom: 1px solid #eee; display: flex; align-items: center; justify-content: space-between;}
        .user-info {display: flex; align-items: center; gap: 10px;}
        .user-info img {width: 32px; height: 32px; border-radius: 50%;}
        .user-info .name {font-weight: bold;}
        .user-info .role {font-size: 12px; color: #888;}
        main {padding: 32px;}
        .sidebar a i {margin-right: 8px;}
        .sidebar-bottom {
            margin-top: auto;
            padding: 16px 32px;
            color: #6c3483;
            font-weight: bold;
            text-decoration: none;
            display: flex;
            align-items: center;
            border-top: 1px solid #eee;
            background: #fff;
            transition: background 0.2s;
        }
        .sidebar-bottom:hover {
            background: #f4f8fb;
            color: #2f80ed;
        }
    </style>
</head>
<body>
    <?php if (isset($_SESSION['admin'])): ?>
        <div class="sidebar" style="display:flex;flex-direction:column;height:100vh;">
            <div style="flex:1 1 auto;display:flex;flex-direction:column;">
                <div class="logo">Mistine</div>
                <nav>
                    <div class="section-title">Menu chính</div>
                    <a href="index.php?controller=product&action=index" class="<?php if(isset($_GET['controller']) && $_GET['controller']=='product') echo 'active'; ?>"><i class="bi bi-box-seam"></i>Quản lý sản phẩm</a>
                    <a href="index.php?controller=category&action=index" class="<?php if(isset($_GET['controller']) && $_GET['controller']=='category') echo 'active'; ?>"><i class="bi bi-folder2-open"></i>Danh mục</a>
                    <a href="index.php?controller=statistic&action=index" class="<?php if(isset($_GET['controller']) && $_GET['controller']=='statistic') echo 'active'; ?>"><i class="bi bi-bar-chart"></i>Thống kê</a>
                    <a href="index.php?controller=account&action=index" class="<?php if(isset($_GET['controller']) && $_GET['controller']=='account') echo 'active'; ?>"><i class="bi bi-person"></i>Tài khoản</a>
                </nav>
            </div>
            <a href="index.php?controller=account&action=logout" class="login-link sidebar-bottom"><i class="bi bi-box-arrow-right"></i>Đăng xuất</a>
        </div>
    <?php endif; ?>
    <div class="main-content">
        <main>
            <?php require __DIR__ . '/' . $view . '.php'; ?>
        </main>
    </div>
</body>
</html> 