<div style="max-width:480px;margin:40px auto;background:#fff;padding:32px 28px 24px 28px;border-radius:16px;box-shadow:0 2px 16px #e3e8f0;">
    <h2 style="text-align:center;color:#1976d2;font-weight:700;margin-bottom:24px;letter-spacing:1px;">Sửa sản phẩm</h2>
    <form method="post" enctype="multipart/form-data" style="display:flex;flex-direction:column;gap:18px;">
        <div style="display:flex;flex-direction:column;gap:6px;">
            <label for="code" style="font-weight:500;text-align:left;">Mã SP:</label>
            <input id="code" type="text" name="code" value="<?= htmlspecialchars($product['code']) ?>" required style="padding:10px 14px;border:1px solid #ccc;border-radius:8px;">
        </div>
        <div style="display:flex;flex-direction:column;gap:6px;">
            <label for="name" style="font-weight:500;text-align:left;">Tên sản phẩm:</label>
            <input id="name" type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" required style="padding:10px 14px;border:1px solid #ccc;border-radius:8px;">
        </div>
        <div style="display:flex;flex-direction:column;gap:6px;">
            <label for="category_id" style="font-weight:500;text-align:left;">Danh mục:</label>
            <select id="category_id" name="category_id" required style="padding:10px 14px;border:1px solid #ccc;border-radius:8px;">
                <option value="">-- Chọn danh mục --</option>
                <?php foreach ($categories as $cat): ?>
                    <option value="<?= $cat['id'] ?>" <?= $cat['id'] == $product['category_id'] ? 'selected' : '' ?>><?= htmlspecialchars($cat['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div style="display:flex;flex-direction:column;gap:6px;">
            <label for="price" style="font-weight:500;text-align:left;">Giá:</label>
            <input id="price" type="number" name="price" value="<?= $product['price'] ?>" required style="padding:10px 14px;border:1px solid #ccc;border-radius:8px;">
        </div>
        <div style="display:flex;flex-direction:column;gap:6px;">
            <label for="stock" style="font-weight:500;text-align:left;">Tồn kho:</label>
            <input id="stock" type="number" name="stock" value="<?= $product['stock'] ?>" required style="padding:10px 14px;border:1px solid #ccc;border-radius:8px;">
        </div>
        <div style="display:flex;flex-direction:column;gap:6px;">
            <label for="sold" style="font-weight:500;text-align:left;">Số lượng đã bán:</label>
            <input id="sold" type="number" name="sold" value="<?= $product['sold'] ?? 0 ?>" min="0" style="padding:10px 14px;border:1px solid #ccc;border-radius:8px;">
        </div>
        <div style="display:flex;flex-direction:column;gap:6px;">
            <label for="status" style="font-weight:500;text-align:left;">Trạng thái:</label>
            <select id="status" name="status" style="padding:10px 14px;border:1px solid #ccc;border-radius:8px;">
                <option value="active" <?= $product['status']=='active'?'selected':'' ?>>Đang bán</option>
                <option value="pending" <?= $product['status']=='pending'?'selected':'' ?>>Chờ duyệt</option>
                <option value="out_of_stock" <?= $product['status']=='out_of_stock'?'selected':'' ?>>Hết hàng</option>
            </select>
        </div>
        <div style="display:flex;flex-direction:column;gap:6px;">
            <label for="description" style="font-weight:500;text-align:left;">Mô tả:</label>
            <textarea id="description" name="description" rows="4" style="padding:10px 14px;border:1px solid #ccc;border-radius:8px;"><?= htmlspecialchars($product['description']) ?></textarea>
        </div>
        <div style="display:flex;flex-direction:column;gap:6px;">
            <label for="image" style="font-weight:500;text-align:left;">Ảnh mới:</label>
            <input id="image" type="file" name="image" accept="image/*" style="padding:10px 14px;border:1px solid #ccc;border-radius:8px;">
        </div>
        <button type="submit" style="padding:12px 0;background:#1976d2;color:#fff;border:none;border-radius:8px;font-weight:bold;font-size:17px;box-shadow:0 2px 8px #e3e8f0;transition:background 0.2s;">Cập nhật</button>
        <a href="index.php?controller=product&action=index" style="text-align:center;margin-top:4px;color:#1976d2;text-decoration:none;font-weight:500;">Quay lại</a>
    </form>
</div> 