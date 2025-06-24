<?php
require_once __DIR__ . '/../models/Category.php';
require_once __DIR__ . '/../core/BaseController.php';
class CategoryController extends BaseController {
    private function checkAuth() {
        if (!isset($_SESSION['admin'])) {
            header('Location: index.php?controller=auth&action=login');
            exit;
        }
    }
    public function index() {
        $this->checkAuth();
        $categoryModel = new Category();
        $name = $_GET['name'] ?? '';
        $description = $_GET['description'] ?? '';
        if ($name || $description) {
            $categories = $categoryModel->search($name, $description);
        } else {
            $categories = $categoryModel->getAll();
        }
        $this->render('categories/index', ['categories' => $categories]);
    }
    public function create() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $description = trim($_POST['description'] ?? '');
            if ($name) {
                $categoryModel = new Category();
                $categoryModel->create(['name' => $name, 'description' => $description]);
                header('Location: index.php?controller=category&action=index');
                exit;
            } else {
                $error = 'Tên danh mục không được để trống!';
            }
        }
        $this->render('categories/create', isset($error) ? ['error' => $error] : []);
    }
    public function edit() {
        $this->checkAuth();
        $categoryModel = new Category();
        $id = $_GET['id'] ?? null;
        $category = $categoryModel->getById($id);
        if (!$category) {
            header('Location: index.php?controller=category&action=index');
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $description = trim($_POST['description'] ?? '');
            if ($name) {
                $categoryModel->update($id, ['name' => $name, 'description' => $description]);
                header('Location: index.php?controller=category&action=index');
                exit;
            } else {
                $error = 'Tên danh mục không được để trống!';
            }
        }
        $this->render('categories/edit', ['category' => $category, 'error' => $error ?? null]);
    }
    public function delete() {
        $this->checkAuth();
        $id = $_GET['id'] ?? null;
        $categoryModel = new Category();
        $categoryModel->delete($id);
        header('Location: index.php?controller=category&action=index');
        exit;
    }
} 