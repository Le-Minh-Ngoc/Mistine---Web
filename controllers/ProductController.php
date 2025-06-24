<?php
require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../models/Category.php';
require_once __DIR__ . '/../core/BaseController.php';
class ProductController extends BaseController {
    private function checkAuth() {
        if (!isset($_SESSION['admin'])) {
            header('Location: index.php?controller=auth&action=login');
            exit;
        }
    }
    public function index() {
        $this->checkAuth();
        $productModel = new Product();
        $name = $_GET['name'] ?? '';
        $description = $_GET['description'] ?? '';
        $sort = $_GET['sort'] ?? '';
        if ($name || $description) {
            $products = $productModel->search($name, $description);
        } else {
            $products = $productModel->getAll();
        }
        // Sắp xếp theo yêu cầu
        if ($sort === 'price_asc') {
            usort($products, function($a, $b) { return $a['price'] <=> $b['price']; });
        } elseif ($sort === 'price_desc') {
            usort($products, function($a, $b) { return $b['price'] <=> $a['price']; });
        } elseif ($sort === 'sold_asc') {
            usort($products, function($a, $b) { return ($a['sold'] ?? 0) <=> ($b['sold'] ?? 0); });
        } elseif ($sort === 'sold_desc') {
            usort($products, function($a, $b) { return ($b['sold'] ?? 0) <=> ($a['sold'] ?? 0); });
        } elseif ($sort === 'stock_asc') {
            usort($products, function($a, $b) { return ($a['stock'] ?? 0) <=> ($b['stock'] ?? 0); });
        } elseif ($sort === 'stock_desc') {
            usort($products, function($a, $b) { return ($b['stock'] ?? 0) <=> ($a['stock'] ?? 0); });
        }
        $this->render('products/index', ['products' => $products]);
    }
    public function create() {
        $this->checkAuth();
        $categoryModel = new Category();
        $categories = $categoryModel->getAll();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $code = $_POST['code'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $stock = $_POST['stock'];
            $category_id = $_POST['category_id'];
            $status = $_POST['status'];
            // Xử lý upload ảnh
            $image = '';
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $upload_dir = __DIR__ . '../../public/uploads/';
                if (!file_exists($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }
                $new_filename = $_FILES['image']['name'];
                $upload_path = $upload_dir . $new_filename;
                if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_path)) {
                    $image = $new_filename;
                }
            }
            $data = [
                'code' => $code,
                'name' => $name,
                'category_id' => $category_id,
                'price' => $price,
                'stock' => $stock,
                'status' => $status,
                'description' => $description,
                'image' => $image
            ];
            $productModel = new Product();
            $productModel->create($data);
            $_SESSION['message'] = 'Thêm sản phẩm thành công!';
            $_SESSION['message_type'] = 'success';
            header('Location: index.php?controller=product&action=index');
            exit();
        }
        $this->render('products/create', ['categories' => $categories]);
    }
    public function edit() {
        $this->checkAuth();
        $productModel = new Product();
        $categoryModel = new Category();
        $categories = $categoryModel->getAll();
        $id = $_GET['id'] ?? null;
        $product = $productModel->getById($id);
        if (!$product) {
            header('Location: index.php?controller=product&action=index');
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $image = $product['image'];
            if (!empty($_FILES['image']['name'])) {
                $upload_dir = __DIR__ . '../../public/uploads/';
                if (!file_exists($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }
                $file_extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                $new_filename = uniqid() . '.' . $file_extension;
                $upload_path = $upload_dir . $new_filename;
                if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_path)) {
                    $image = $new_filename;
                }
            }
            $data = [
                'code' => $_POST['code'],
                'name' => $_POST['name'],
                'category_id' => $_POST['category_id'],
                'price' => $_POST['price'],
                'stock' => $_POST['stock'],
                'status' => $_POST['status'],
                'description' => $_POST['description'],
                'image' => $image,
                'sold' => isset($_POST['sold']) ? $_POST['sold'] : ($product['sold'] ?? 0)
            ];
            $productModel->update($id, $data);
            header('Location: index.php?controller=product&action=index');
            exit;
        }
        $this->render('products/edit', ['product' => $product, 'categories' => $categories]);
    }
    public function delete() {
        $this->checkAuth();
        $id = $_GET['id'] ?? null;
        $productModel = new Product();
        $productModel->delete($id);
        header('Location: index.php?controller=product&action=index');
        exit;
    }
} 