<?php
require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../models/Category.php';
require_once __DIR__ . '/../core/BaseController.php';
class StatisticController extends BaseController {
    private function checkAuth() {
        if (!isset($_SESSION['admin'])) {
            header('Location: index.php?controller=account&action=login');
            exit;
        }
    }
    public function index() {
        $this->checkAuth();
        $productModel = new Product();
        $categoryModel = new Category();
        $products = $productModel->getAll();
        $totalProducts = count($products);
        $totalCategories = count($categoryModel->getAll());
        $totalStock = 0;
        $totalRevenue = 0;
        $totalSold = 0;
        $totalSales = 0;
        foreach ($products as $p) {
            $totalStock += (int)$p['stock'];
            $totalRevenue += (int)$p['stock'] * (float)$p['price'];
            $totalSold += (int)($p['sold'] ?? 0);
            $totalSales += (int)($p['sold'] ?? 0) * (float)$p['price'];
        }
        // Top sản phẩm bán chạy nhất theo số lượng đã bán
        $productsBySold = $products;
        usort($productsBySold, function($a, $b) {
            return ((int)($b['sold'] ?? 0)) <=> ((int)($a['sold'] ?? 0));
        });
        $topBestSeller = array_slice($productsBySold, 0, 5);
        // Top sản phẩm tồn kho nhiều nhất
        usort($productsBySold, function($a, $b) { return $b['stock'] <=> $a['stock']; });
        $topStock = array_slice($productsBySold, 0, 5);
        $this->render('statistic/index', [
            'totalProducts' => $totalProducts,
            'totalCategories' => $totalCategories,
            'totalStock' => $totalStock,
            'totalRevenue' => $totalRevenue,
            'totalSold' => $totalSold,
            'totalSales' => $totalSales,
            'topBestSeller' => $topBestSeller,
            'topStock' => $topStock,
            'allProducts' => $products
        ]);
    }
} 