<?php 
$isEdit = isset($_GET['edit']) && $_GET['edit'] == 1;
$isPassword = isset($_GET['password']) && $_GET['password'] == 1;
?>
<div style="max-width:420px;margin:40px auto;background:#fff;padding:36px 32px 28px 32px;border-radius:16px;box-shadow:0 4px 24px #e3e8f0;">
    <h2 style="text-align:center;margin-bottom:24px;color:#1976d2;letter-spacing:1px;font-weight:700;">Thông tin tài khoản</h2>
    <div style="display:flex;flex-direction:column;align-items:center;gap:10px;margin-bottom:18px;">
        <?php if (!empty($user['avatar'])): ?>
            <img src="uploads/<?= htmlspecialchars($user['avatar']) ?>" width="100" height="100" style="border-radius:50%;border:3px solid #e3e8f0;object-fit:cover;">
        <?php else: ?>
            <div style="width:100px;height:100px;border-radius:50%;background:#f3f3f3;display:flex;align-items:center;justify-content:center;font-size:40px;color:#bbb;border:3px solid #e3e8f0;"> <i class="bi bi-person"></i> </div>
        <?php endif; ?>
        <div style="font-size:18px;font-weight:600;"> <?= htmlspecialchars($user['username']) ?> </div>
    </div>
    <?php if (!$isEdit && !$isPassword): ?>
        <div style="margin-bottom:18px;">
            <div style="margin-bottom:8px;"><b>Địa chỉ:</b> <?= htmlspecialchars($user['address'] ?? '-') ?></div>
            <div style="margin-bottom:8px;"><b>Ngày sinh:</b> <?= !empty($user['birthday']) ? date('d/m/Y', strtotime($user['birthday'])) : '-' ?></div>
        </div>
        <div style="display:flex;gap:12px;">
            <a href="index.php?controller=account&action=index&edit=1" style="flex:1;display:block;background:#1976d2;color:#fff;padding:12px 0;border:none;border-radius:8px;font-size:17px;font-weight:bold;box-shadow:0 2px 8px #e3e8f0;text-align:center;text-decoration:none;">Sửa thông tin</a>
            <a href="index.php?controller=account&action=index&password=1" style="flex:1;display:block;background:#219653;color:#fff;padding:12px 0;border:none;border-radius:8px;font-size:17px;font-weight:bold;box-shadow:0 2px 8px #e3e8f0;text-align:center;text-decoration:none;">Đổi mật khẩu</a>
        </div>
    <?php elseif ($isEdit): ?>
        <form method="post" action="index.php?controller=account&action=update" enctype="multipart/form-data" style="display:flex;flex-direction:column;gap:16px;">
            <label style="font-weight:500;">Địa chỉ:
                <input type="text" name="address" value="<?= htmlspecialchars($user['address'] ?? '') ?>" style="padding:12px 14px;border:1px solid #c3cfe6;border-radius:8px;width:93%;margin-top:4px;font-size:15px;background:#f5f8ff;">
            </label>
            <label style="font-weight:500;">Ngày sinh:
                <input type="date" name="birthday" value="<?= htmlspecialchars($user['birthday'] ?? '') ?>" style="padding:12px 14px;border:1px solid #c3cfe6;border-radius:8px;width:93%;margin-top:4px;font-size:15px;background:#f5f8ff;">
            </label>
            <button type="submit" style="background:#1976d2;color:#fff;padding:12px 0;border:none;border-radius:8px;font-size:17px;font-weight:bold;box-shadow:0 2px 8px #e3e8f0;transition:background 0.2s;width:100%;margin-top:4px;">Lưu thay đổi</button>
            <a href="index.php?controller=account&action=index" style="text-align:center;margin-top:4px;color:#1976d2;text-decoration:none;font-weight:500;">Hủy</a>
            <?php if (!empty($msg)): ?>
                <p style="color:green;text-align:center;margin-top:10px;"> <?= htmlspecialchars($msg) ?> </p>
            <?php endif; ?>
        </form>
    <?php elseif ($isPassword): ?>
        <form method="post" action="index.php?controller=account&action=update" style="display:flex;flex-direction:column;gap:16px;">
            <label style="font-weight:500;">Mật khẩu mới:
                <input type="password" name="password" style="padding:12px 14px;border:1px solid #c3cfe6;border-radius:8px;width:93%;margin-top:4px;font-size:15px;background:#f5f8ff;">
            </label>
            <button type="submit" style="background:#219653;color:#fff;padding:12px 0;border:none;border-radius:8px;font-size:17px;font-weight:bold;box-shadow:0 2px 8px #e3e8f0;transition:background 0.2s;width:100%;margin-top:4px;">Đổi mật khẩu</button>
            <a href="index.php?controller=account&action=index" style="text-align:center;margin-top:4px;color:#1976d2;text-decoration:none;font-weight:500;">Hủy</a>
            <?php if (!empty($msg)): ?>
                <p style="color:green;text-align:center;margin-top:10px;"> <?= htmlspecialchars($msg) ?> </p>
            <?php endif; ?>
        </form>
    <?php endif; ?>
</div> 