<div style="display:flex;justify-content:center;align-items:center;height:80vh;">
<div style="background:#fff;padding:36px 32px 28px 32px;border-radius:12px;box-shadow:0 2px 16px #eee;min-width:340px;">
    <h2 style="text-align:center;margin-bottom:24px;color:#1976d2;"><i class="bi bi-person-circle"></i> Đăng nhập quản trị</h2>
    <?php if (!empty($error)) echo '<p style=\'color:red;text-align:center;\'>'.$error.'</p>'; ?>
    <form method="post" style="display:flex;flex-direction:column;gap:16px;">
        <label style="font-weight:500;">Tài khoản:
            <input type="text" name="username" required style="padding:12px 14px;border:1px solid #c3cfe6;border-radius:8px;width:100%;margin-top:4px;font-size:15px;box-sizing:border-box;background:#f5f8ff;">
        </label>
        <label style="font-weight:500;">Mật khẩu:
            <input type="password" name="password" required style="padding:12px 14px;border:1px solid #c3cfe6;border-radius:8px;width:100%;margin-top:4px;font-size:15px;box-sizing:border-box;background:#f5f8ff;">
        </label>
        <button type="submit" style="background:#1976d2;color:#fff;padding:12px 0;border:none;border-radius:8px;font-size:17px;font-weight:bold;box-shadow:0 2px 8px #e3e8f0;transition:background 0.2s;width:100%;margin-top:4px;">Đăng nhập</button>
    </form>
    <div style="display:flex;justify-content:center;align-items:center;gap:6px;margin-top:20px;">
        <span style="color:#888;">Bạn chưa có tài khoản?</span><br>
        <a href="index.php?controller=account&action=register" style="color:#1976d2;text-decoration:none;font-weight:500;">Đăng ký tài khoản</a>
    </div>
</div>
</div> 