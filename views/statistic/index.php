<style>
body { font-family: 'Montserrat', Arial, sans-serif; font-size: 16px; }
h2, h3, th { font-family: 'Montserrat', Arial, sans-serif; font-weight: bold; }
td, p, div, table { font-family: 'Montserrat', Arial, sans-serif; }
</style>

<h2>Thống kê tổng quan</h2>
<div style="display:flex;gap:32px;flex-wrap:wrap;">
    <div style="background:#fff;padding:24px 32px;border-radius:12px;box-shadow:0 2px 8px #eee;min-width:200px;">
        <div style="font-size:16px;color:#888;">Tổng sản phẩm</div>
        <div style="font-size:32px;font-weight:bold;"><?= $totalProducts ?></div>
    </div>
    <div style="background:#fff;padding:24px 32px;border-radius:12px;box-shadow:0 2px 8px #eee;min-width:200px;">
        <div style="font-size:16px;color:#888;">Tổng danh mục</div>
        <div style="font-size:32px;font-weight:bold;"><?= $totalCategories ?></div>
    </div>
    <div style="background:#fff;padding:24px 32px;border-radius:12px;box-shadow:0 2px 8px #eee;min-width:200px;">
        <div style="font-size:16px;color:#888;">Tổng tồn kho</div>
        <div style="font-size:32px;font-weight:bold;"><?= $totalStock ?></div>
    </div>
    <div style="background:#fff;padding:24px 32px;border-radius:12px;box-shadow:0 2px 8px #eee;min-width:200px;">
        <div style="font-size:16px;color:#888;">Tổng giá trị tồn kho</div>
        <div style="font-size:32px;font-weight:bold;"><?= number_format($totalRevenue,0,',','.') ?> đ</div>
    </div>
    <div style="background:#fff;padding:24px 32px;border-radius:12px;box-shadow:0 2px 8px #eee;min-width:200px;">
        <div style="font-size:16px;color:#888;">Tổng sản phẩm đã bán</div>
        <div style="font-size:32px;font-weight:bold;"><?= $totalSold ?></div>
    </div>
    <div style="background:#fff;padding:24px 32px;border-radius:12px;box-shadow:0 2px 8px #eee;min-width:200px;">
        <div style="font-size:16px;color:#888;">Tổng doanh số đã bán</div>
        <div style="font-size:32px;font-weight:bold;"><?= number_format($totalSales,0,',','.') ?> đ</div>
    </div>
</div>
<br>
<h3>Biểu đồ doanh số đã bán theo từng sản phẩm</h3>
<canvas id="allSalesChart" width="900" height="350"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
<?php
$labelsAll = [];
$dataAll = [];
$productsBySales = $allProducts;
// Sắp xếp theo doanh số đã bán ra (sold * price) giảm dần
usort($productsBySales, function($a, $b) {
    $salesA = (int)($a['sold'] ?? 0) * (float)($a['price'] ?? 0);
    $salesB = (int)($b['sold'] ?? 0) * (float)($b['price'] ?? 0);
    return $salesB <=> $salesA;
});
$productsBySales = array_slice($productsBySales, 0, 10); // Lấy 10 sản phẩm bán cao nhất
foreach ($productsBySales as $p) {
    $labelsAll[] = htmlspecialchars($p['name']);
    $dataAll[] = (int)($p['sold'] ?? 0) * (float)($p['price'] ?? 0);
}
?>
const ctxAll = document.getElementById('allSalesChart').getContext('2d');
const allSalesChart = new Chart(ctxAll, {
    type: 'bar',
    data: {
        labels: <?= json_encode($labelsAll) ?>,
        datasets: [{
            label: 'Doanh số đã bán (VNĐ)',
            data: <?= json_encode($dataAll) ?>,
            backgroundColor: 'rgba(35, 104, 231, 0.6)',
            borderColor: 'rgb(50, 91, 202)',
            borderWidth: 1
        }]
    },
    options: {
        indexAxis: 'x',
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function(value) {
                        return value.toLocaleString('vi-VN');
                    }
                }
            }
        },
        plugins: {
            tooltip: {
                callbacks: {
                    label: function(context) {
                        let v = context.parsed.y;
                        let index = context.dataIndex;
                        const soldArr = <?= json_encode(array_map(function($p){return (int)($p['sold'] ?? 0);}, $productsBySales)) ?>;
                        let sold = soldArr[index] ?? 0;
                        return 'Doanh số: ' + v.toLocaleString('vi-VN') + ' đ' + '\nĐã bán: ' + sold + ' sản phẩm';
                    }
                }
            }
        }
    }
});
</script>
<br>
<div style="display:flex;gap:32px;align-items:flex-start;flex-wrap:wrap;">
  <div style="flex:1 1 100%;min-width:340px;max-width:800px;margin:0 auto;">
    <h3>Top sản phẩm bán chạy nhất</h3>
    <?php if (!empty($topBestSeller)): ?>
    <table border="1" cellpadding="8" cellspacing="0" style="width:100%;background:#fff;table-layout:fixed;margin-bottom:32px;">
        <tr style="background:#f5f5f5;">
            <th style="width:60px;text-align:center;">Ảnh</th>
            <th style="width:160px;text-align:center;">Tên sản phẩm</th>
            <th style="width:70px;text-align:center;">Mã SP</th>
            <th style="width:110px;text-align:center;">Danh mục</th>
            <th style="width:90px;text-align:center;">Giá bán</th>
            <th style="width:70px;text-align:center;">Đã bán</th>
            <th style="width:70px;text-align:center;">Tồn kho</th>
        </tr>
        <?php foreach ($topBestSeller as $p): ?>
        <tr style="height:64px;">
            <td style="text-align:center;vertical-align:middle;"><?php if ($p['image']): ?><img src="uploads/<?= $p['image'] ?>" width="40" style="border-radius:6px"><?php endif; ?></td>
            <td style="text-align:center;vertical-align:middle;"> <?= htmlspecialchars($p['name']) ?> </td>
            <td style="text-align:center;vertical-align:middle;"> <?= htmlspecialchars($p['code']) ?> </td>
            <td style="text-align:center;vertical-align:middle;"> <?= htmlspecialchars($p['category_name']) ?> </td>
            <td style="text-align:center;vertical-align:middle;"> <?= number_format($p['price'],0,',','.') ?> đ </td>
            <td style="text-align:center;vertical-align:middle;"> <?= (int)($p['sold'] ?? 0) ?> </td>
            <td style="text-align:center;vertical-align:middle;"> <?= (int)($p['stock'] ?? 0) ?> </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php else: ?>
    <p>Không có dữ liệu sản phẩm.</p>
    <?php endif; ?>
  </div>
  <div style="flex:1 1 100%;min-width:340px;max-width:800px;margin:0 auto;">
    <h3>Sản phẩm tồn kho nhiều nhất</h3>
    <?php if (!empty($topStock)): ?>
    <table border="1" cellpadding="8" cellspacing="0" style="width:100%;background:#fff;table-layout:fixed;">
        <tr style="background:#f5f5f5;">
            <th style="width:60px;text-align:center;">Ảnh</th>
            <th style="width:160px;text-align:center;">Tên sản phẩm</th>
            <th style="width:70px;text-align:center;">Mã SP</th>
            <th style="width:110px;text-align:center;">Danh mục</th>
            <th style="width:90px;text-align:center;">Giá bán</th>
            <th style="width:70px;text-align:center;">Đã bán</th>
            <th style="width:70px;text-align:center;">Tồn kho</th>
        </tr>
        <?php foreach ($topStock as $p): ?>
        <tr style="height:64px;">
            <td style="text-align:center;vertical-align:middle;"><?php if ($p['image']): ?><img src="uploads/<?= $p['image'] ?>" width="40" style="border-radius:6px"><?php endif; ?></td>
            <td style="text-align:center;vertical-align:middle;"> <?= htmlspecialchars($p['name']) ?> </td>
            <td style="text-align:center;vertical-align:middle;"> <?= htmlspecialchars($p['code']) ?> </td>
            <td style="text-align:center;vertical-align:middle;"> <?= htmlspecialchars($p['category_name']) ?> </td>
            <td style="text-align:center;vertical-align:middle;"> <?= number_format($p['price'],0,',','.') ?> đ </td>
            <td style="text-align:center;vertical-align:middle;"> <?= (int)($p['sold'] ?? 0) ?> </td>
            <td style="text-align:center;vertical-align:middle;"> <?= (int)($p['stock'] ?? 0) ?> </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php else: ?>
    <p>Không có dữ liệu sản phẩm.</p>
    <?php endif; ?>
  </div>
</div> 