<div style="display:flex;justify-content:center;align-items:flex-start;height:80vh;margin-top:32px;">
<div style="background:#fff;padding:36px 32px 28px 32px;border-radius:16px;box-shadow:0 4px 24px #e3e8f0;min-width:340px;max-width:370px;width:100%;">
    <h2 style="text-align:center;margin-bottom:24px;color:#1976d2;"><i class="bi bi-person-plus"></i> Đăng ký tài khoản</h2>
    <?php if (!empty($error)) echo '<p style=\'color:red;text-align:center;margin-bottom:12px;\'>'.$error.'</p>'; ?>
    <form method="post" style="display:flex;flex-direction:column;gap:18px;">
        <label style="font-weight:500;">Tài khoản:
            <input type="text" name="username" required style="padding:12px 14px;border:1px solid #c3cfe6;border-radius:8px;width:100%;margin-top:4px;font-size:15px;box-sizing:border-box;background:#f5f8ff;">
        </label>
        <label style="font-weight:500;">Mật khẩu:
            <input type="password" name="password" required style="padding:12px 14px;border:1px solid #c3cfe6;border-radius:8px;width:100%;margin-top:4px;font-size:15px;box-sizing:border-box;background:#f5f8ff;">
        </label>
        <label style="font-weight:500;">Xác nhận mật khẩu:
            <input type="password" name="confirm_password" required style="padding:12px 14px;border:1px solid #c3cfe6;border-radius:8px;width:100%;margin-top:4px;font-size:15px;box-sizing:border-box;background:#f5f8ff;">
        </label>
        <label style="font-weight:500;">Địa chỉ:
            <input type="text" name="address" style="padding:12px 14px;border:1px solid #c3cfe6;border-radius:8px;width:100%;margin-top:4px;font-size:15px;box-sizing:border-box;background:#f5f8ff;">
        </label>
        <label style="font-weight:500;">Ngày sinh:
            <input type="date" name="birthday" style="padding:12px 14px;border:1px solid #c3cfe6;border-radius:8px;width:100%;margin-top:4px;font-size:15px;box-sizing:border-box;background:#f5f8ff;">
        </label>
        <button type="submit" style="background:#1976d2;color:#fff;padding:12px 0;border:none;border-radius:8px;font-size:17px;font-weight:bold;box-shadow:0 2px 8px #e3e8f0;transition:background 0.2s;width:100%;margin-top:4px;">Đăng ký</button>
    </form>
    <div style="display:flex;justify-content:center;align-items:center;gap:6px;margin-top:20px;">
        <span style="color:#888;">Bạn đã có tài khoản?</span>
        <a href="index.php?controller=account&action=login" style="color:#1976d2;text-decoration:none;font-weight:500;"> Quay lại đăng nhập</a>
    </div>
</div>
</div> 