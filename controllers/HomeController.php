<?php

require_once __DIR__ . '/../models/Category.php';
require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../core/BaseController.php';

class HomeController extends BaseController {
    public function modernHome() {
        $categoryModel = new Category();
        $productModel = new Product();
        $categories = $categoryModel->getAll();

        // Lấy sản phẩm nổi bật (theo lượt bán)
        $products = $productModel->getFeatured(); // hoặc getAll(), hoặc getBestSeller()
        $products = array_slice($products, 0, 4);

        // Lấy tất cả sản phẩm để hiển thị ở phần "Tất cả sản phẩm"
        $allProducts = $productModel->getAll();

        $categories = $categories;
        $products = $products;
        $allProducts = $allProducts;
        require __DIR__ . '/../home/home.php';
    }
}
