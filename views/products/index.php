<style>
body { font-family: 'Montserrat', Arial, sans-serif; font-size: 16px; }
h2, th { font-family: 'Montserrat', Arial, sans-serif; font-weight: bold; }
td, p, div, table, input, button, select, a { font-family: 'Montserrat', Arial, sans-serif; }
</style>

<h2 style="margin-bottom:12px;">Quản lý sản phẩm</h2>
<?php
$total = count($products);
$lowStock = 0;
$outStock = 0;
foreach ($products as $p) {
    if (isset($p['stock']) && $p['stock'] > 0 && $p['stock'] <= 5) $lowStock++;
    if (isset($p['stock']) && $p['stock'] == 0) $outStock++;
}
?>
<div style="display:flex;gap:32px;align-items:center;margin-top:18px;margin-bottom:18px;">
    <div style="font-size:1.08rem;color:#1976d2;font-weight:600;">Tổng sản phẩm: <span style="color:#222;"><?= $total ?></span></div>
    <div style="font-size:1.08rem;color:#e67e22;font-weight:600;">Sắp hết hàng: <span style="color:#c0392b;"><?= $lowStock ?></span></div>
    <div style="font-size:1.08rem;color:#e74c3c;font-weight:600;">Hết hàng: <span style="color:#c0392b;"><?= $outStock ?></span></div>
</div>
<div style="background:#fafbfc;padding:18px 18px 8px 18px;border-radius:10px;margin-bottom:24px;">
<form method="get" style="display:flex;gap:12px;align-items:center;margin-bottom:16px;">
    <input type="hidden" name="controller" value="product">
    <input type="hidden" name="action" value="index">
    <select name="sort" onchange="this.form.submit()" style="padding:10px 14px;border:1px solid #ccc;border-radius:6px;min-width:160px;">
        <option value="">Sắp xếp theo</option>
        <option value="price_asc" <?= (isset($_GET['sort']) && $_GET['sort']==='price_asc')?'selected':'' ?>>Giá tăng dần</option>
        <option value="price_desc" <?= (isset($_GET['sort']) && $_GET['sort']==='price_desc')?'selected':'' ?>>Giá giảm dần</option>
        <option value="sold_desc" <?= (isset($_GET['sort']) && $_GET['sort']==='sold_asc')?'selected':'' ?>>Lượt bán</option>
        <option value="stock_desc" <?= (isset($_GET['sort']) && $_GET['sort']==='stock_desc')?'selected':'' ?>>Tồn kho</option>
    </select>
    <input type="text" name="name" placeholder="Tên sản phẩm" value="<?= htmlspecialchars($_GET['name'] ?? '') ?>" style="padding:10px 14px;border:1px solid #ccc;border-radius:6px;min-width:180px;">
    <button type="submit" style="padding:10px 18px;border:1px solid #ccc;border-radius:6px;background:#fff;cursor:pointer;display:flex;align-items:center;gap:6px;">
        <i class="bi bi-search"></i> Tìm kiếm
    </button>
    
    <a href="index.php?controller=product&action=create" style="background:#1976d2;color:#fff;padding:10px 24px;border:none;border-radius:6px;text-decoration:none;display:inline-block;margin-left:auto;font-weight:bold;font-size:16;">+ Thêm sản phẩm</a>
</form>
<div style="overflow-x:auto;">
<table style="width:100%;border-collapse:collapse;background:#fff;text-align:center;">
    <thead style="background:#f5f5f5;">
    <tr>
        <th style="padding:12px 8px;border-bottom:2px solid #eee;text-align:center;">Mã sản phẩm</th>
        <th style="padding:12px 8px;border-bottom:2px solid #eee;text-align:center;">Ảnh</th>
        <th style="padding:12px 8px;border-bottom:2px solid #eee;text-align:center;">Tên sản phẩm</th>
        <th style="padding:12px 8px;border-bottom:2px solid #eee;text-align:center;">Danh mục</th>
        <th style="padding:12px 8px;border-bottom:2px solid #eee;text-align:center;">Mô tả</th>
        <th style="padding:12px 8px;border-bottom:2px solid #eee;text-align:center;">Giá</th>
        <th style="padding:12px 8px;border-bottom:2px solid #eee;text-align:center;">Đã bán</th>
        <th style="padding:12px 8px;border-bottom:2px solid #eee;text-align:center;">Tồn kho</th>
        <th style="padding:12px 8px;border-bottom:2px solid #eee;text-align:center;">Trạng thái</th>
        <th style="padding:12px 8px;border-bottom:2px solid #eee;text-align:center;">Thao tác</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $p): ?>
    <tr>
        <td style="padding:10px 8px;border-bottom:1px solid #eee;text-align:center;vertical-align:middle;"> <?= htmlspecialchars($p['code']) ?> </td>
        <td style="padding:10px 8px;border-bottom:1px solid #eee;text-align:center;vertical-align:middle;">
            <?php if ($p['image']): ?>
                <img src="uploads/<?= $p['image'] ?>" width="40" style="border-radius:6px">
            <?php endif; ?>
        </td>
        <td style="padding:10px 8px;border-bottom:1px solid #eee;text-align:center;vertical-align:middle;"> <?= htmlspecialchars($p['name']) ?> </td>
        <td style="padding:10px 8px;border-bottom:1px solid #eee;text-align:center;vertical-align:middle;"> <?= htmlspecialchars($p['category_name']) ?> </td>
        <td style="padding:10px 8px;border-bottom:1px solid #eee;text-align:center;vertical-align:middle;"> <?= htmlspecialchars($p['description']) ?> </td>
        <td style="padding:10px 8px;border-bottom:1px solid #eee;text-align:center;vertical-align:middle;"> <?= number_format($p['price'], 0, ',', '.') ?> </td>
        <td style="padding:10px 8px;border-bottom:1px solid #eee;text-align:center;vertical-align:middle;"> <?= $p['sold'] ?> </td>
        <td style="padding:10px 8px;border-bottom:1px solid #eee;text-align:center;vertical-align:middle;"> <?= $p['stock'] ?> </td>
        <td style="padding:10px 8px;border-bottom:1px solid #eee;text-align:center;vertical-align:middle;">
            <?php if ((int)$p['stock'] === 0): ?>
                <span style="color:#e74c3c;font-weight:bold;">Hết hàng</span>
            <?php elseif ((int)$p['stock'] <= 5): ?>
                <span style="color:#e67e22;font-weight:bold;">Sắp hết hàng</span>
            <?php else: ?>
                <span style="color:#27ae60;font-weight:bold;">Còn hàng</span>
            <?php endif; ?>
        </td>
        <td style="padding:10px 8px;border-bottom:1px solid #eee;text-align:center;vertical-align:middle;">
          <div style="display:flex;justify-content:center;align-items:center;gap:8px;white-space:nowrap;">
            <a href="index.php?controller=product&action=edit&id=<?= $p['id'] ?>" style="color:#27ae60;border:1px solid #27ae60;padding:4px 10px;border-radius:4px;display:flex;align-items:center;justify-content:center;font-size:18px;background:#f6fff8;transition:background 0.2s;">
              <i class="bi bi-pencil-square"></i>
            </a>
            <a href="#" class="delete-btn" data-href="index.php?controller=product&action=delete&id=<?= $p['id'] ?>" style="color:#e74c3c;border:1px solid #e74c3c;padding:4px 10px;border-radius:4px;display:flex;align-items:center;justify-content:center;font-size:18px;background:#fff6f6;transition:background 0.2s;">
              <i class="bi bi-trash"></i>
            </a>
          </div>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</div>
</div>

<!-- Popup xác nhận xóa -->
<div id="delete-confirm-modal" style="display:none;position:fixed;z-index:9999;left:0;top:0;width:100vw;height:100vh;background:rgba(0,0,0,0.25);align-items:center;justify-content:center;">
  <div style="background:#fff;padding:32px 28px 24px 28px;border-radius:12px;box-shadow:0 4px 32px #0002;max-width:90vw;width:340px;text-align:center;position:relative;">
    <div style="font-size:2.2rem;color:#e74c3c;margin-bottom:12px;"><i class="bi bi-exclamation-triangle-fill"></i></div>
    <div style="font-size:1.15rem;font-weight:500;margin-bottom:18px;">Bạn có chắc chắn muốn xóa mục này?</div>
    <div style="display:flex;gap:16px;justify-content:center;">
      <button id="delete-confirm-yes" style="background:#e74c3c;color:#fff;padding:8px 22px;border:none;border-radius:6px;font-weight:bold;cursor:pointer;">Xóa</button>
      <button id="delete-confirm-no" style="background:#eee;color:#222;padding:8px 22px;border:none;border-radius:6px;font-weight:bold;cursor:pointer;">Hủy</button>
    </div>
  </div>
</div>
<script>
document.querySelectorAll('.delete-btn').forEach(function(btn) {
  btn.addEventListener('click', function(e) {
    e.preventDefault();
    const href = btn.getAttribute('data-href');
    const modal = document.getElementById('delete-confirm-modal');
    modal.style.display = 'flex';
    document.getElementById('delete-confirm-yes').onclick = function() {
      window.location.href = href;
    };
    document.getElementById('delete-confirm-no').onclick = function() {
      modal.style.display = 'none';
    };
    modal.onclick = function(ev) {
      if (ev.target === modal) modal.style.display = 'none';
    };
  });
});
</script>
