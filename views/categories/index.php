<h2 style="margin-bottom:24px;">Quản lý danh mục</h2>
<div style="background:#fafbfc;padding:18px 18px 8px 18px;border-radius:10px;margin-bottom:24px;">
<form method="get" style="display:flex;gap:12px;align-items:center;margin-bottom:16px;">
    <input type="hidden" name="controller" value="category">
    <input type="hidden" name="action" value="index">
    <input type="text" name="name" placeholder="Tên danh mục" value="<?= htmlspecialchars($_GET['name'] ?? '') ?>" style="padding:10px 14px;border:1px solid #ccc;border-radius:6px;min-width:180px;">
    <button type="submit" style="padding:10px 18px;border:1px solid #ccc;border-radius:6px;background:#fff;cursor:pointer;display:flex;align-items:center;gap:6px;">
        <i class="bi bi-search"></i> Tìm kiếm
    </button>
    <a href="index.php?controller=category&action=create" style="background:#1976d2;color:#fff;padding:10px 24px;border:none;border-radius:6px;text-decoration:none;display:inline-block;margin-left:auto;font-weight:bold;font-size:16px;">+ Thêm danh mục</a>
</form>
<div style="overflow-x:auto;">
<table style="width:100%;border-collapse:collapse;background:#fff;text-align:center;">
    <thead style="background:#f5f5f5;">
    <tr>
        <th style="padding:12px 8px;border-bottom:2px solid #eee;text-align:center;">ID</th>
        <th style="padding:12px 8px;border-bottom:2px solid #eee;text-align:center;">Tên danh mục</th>
        <th style="padding:12px 8px;border-bottom:2px solid #eee;text-align:center;">Mô tả</th>
        <th style="padding:12px 8px;border-bottom:2px solid #eee;text-align:center;">Thao tác</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($categories as $cat): ?>
    <tr>
        <td style="padding:10px 8px;border-bottom:1px solid #eee;text-align:center;vertical-align:middle;"> <?= $cat['id'] ?> </td>
        <td style="padding:10px 8px;border-bottom:1px solid #eee;text-align:center;vertical-align:middle;"> <?= htmlspecialchars($cat['name']) ?> </td>
        <td style="padding:10px 8px;border-bottom:1px solid #eee;text-align:center;vertical-align:middle;"> <?= htmlspecialchars($cat['description'] ?? '') ?>
        </td>
        <td style="padding:10px 8px;border-bottom:1px solid #eee;text-align:center;vertical-align:middle;">
            <a href="index.php?controller=category&action=edit&id=<?= $cat['id'] ?>" style="color:#27ae60;border:1px solid #27ae60;padding:4px 10px;border-radius:4px;display:inline-block;"><i class="bi bi-pencil-square"></i></a>
            <a href="#" class="delete-btn" data-href="index.php?controller=category&action=delete&id=<?= $cat['id'] ?>" style="color:#e74c3c;border:1px solid #e74c3c;padding:4px 10px;border-radius:4px;display:inline-block;margin-left:6px;"><i class="bi bi-trash"></i></a>
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
<style>
.category-desc-wrap {
    white-space: normal;
    word-break: break-word;
    max-width: 320px;
}
</style> 