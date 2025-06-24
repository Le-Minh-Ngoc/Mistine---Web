<div style="max-width:420px;margin:40px auto;background:#fff;padding:32px 28px 24px 28px;border-radius:16px;box-shadow:0 2px 16px #e3e8f0;">
    <h2 style="text-align:center;color:#1976d2;font-weight:700;margin-bottom:24px;letter-spacing:1px;">Thêm danh mục</h2>
    <?php if (!empty($error)) echo '<p style="color:red;text-align:center;">'.$error.'</p>'; ?>
    <form method="post" style="display:flex;flex-direction:column;gap:18px;">
        <div style="display:flex;flex-direction:column;gap:6px;">
            <label for="name" style="font-weight:500;text-align:left;">Tên danh mục:</label>
            <input id="name" type="text" name="name" required style="padding:10px 14px;border:1px solid #ccc;border-radius:8px;">
        </div>
        <div style="display:flex;flex-direction:column;gap:6px;">
            <label for="description" style="font-weight:500;text-align:left;">Mô tả:</label>
            <textarea id="description" name="description" rows="3" style="padding:10px 14px;border:1px solid #ccc;border-radius:8px;"></textarea>
        </div>
        <button type="submit" style="padding:12px 0;background:#1976d2;color:#fff;border:none;border-radius:8px;font-weight:bold;font-size:17px;box-shadow:0 2px 8px #e3e8f0;transition:background 0.2s;">Lưu</button>
        <a href="index.php?controller=category&action=index" style="text-align:center;margin-top:4px;color:#1976d2;text-decoration:none;font-weight:500;">Quay lại</a>
    </form>
</div> 