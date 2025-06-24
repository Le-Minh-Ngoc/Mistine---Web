<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../core/BaseController.php';
class AccountController extends BaseController {
    private function checkAuth() {
        if (!isset($_SESSION['admin'])) {
            header('Location: index.php?controller=account&action=login');
            exit;
        }
    }
    public function index() {
        $this->checkAuth();
        $userModel = new User();
        $username = $_SESSION['admin'];
        $user = $userModel->getByUsername($username);
        $this->render('account/index', ['user' => $user]);
    }
    public function update() {
        $this->checkAuth();
        $userModel = new User();
        $username = $_SESSION['admin'];
        $user = $userModel->getByUsername($username);
        $msg = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Nếu chỉ đổi mật khẩu
            if (isset($_POST['password']) && strlen(trim($_POST['password'])) > 0 && count($_POST) === 1) {
                $newpass = $_POST['password'];
                $userModel->updatePassword($user['id'], $newpass);
                $msg = 'Đổi mật khẩu thành công!';
                $user = $userModel->getByUsername($username);
                $this->render('account/index', ['user' => $user, 'msg' => $msg]);
                return;
            }
            // Cập nhật thông tin cá nhân
            $address = $_POST['address'] ?? $user['address'];
            $birthday = $_POST['birthday'] ?? $user['birthday'];
            $userModel->updateInfo($user['id'], $address, $birthday);
            $msg = 'Cập nhật thông tin thành công!';
            $user = $userModel->getByUsername($username);
        }
        $this->render('account/index', ['user' => $user, 'msg' => $msg]);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userModel = new User();
            $user = $userModel->login($_POST['username'], $_POST['password']);
            if ($user) {
                $_SESSION['admin'] = $user['username'];
                header('Location: index.php?controller=product&action=index');
                exit;
            } else {
                $error = 'Sai tài khoản hoặc mật khẩu!';
            }
        }
        $error = isset($error) ? $error : '';
        require __DIR__ . '/../views/account/login.php';
    }
    public function logout() {
        session_destroy();
        header('Location: index.php');
        exit;
    }
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username']);
            $password = $_POST['password'];
            $confirm = $_POST['confirm_password'];
            $address = $_POST['address'] ?? null;
            $birthday = $_POST['birthday'] ?? null;
            $avatar = null;
            
            $userModel = new User();
            $error = '';
            if (!$username || !$password || !$confirm) {
                $error = 'Vui lòng nhập đầy đủ thông tin.';
            } elseif ($password !== $confirm) {
                $error = 'Mật khẩu xác nhận không khớp.';
            } elseif ($userModel->getByUsername($username)) {
                $error = 'Tên đăng nhập đã tồn tại.';
            } else {
                $userModel->createUser($username, $password, $address, $birthday, $avatar);
                header('Location: index.php?controller=account&action=login');
                exit;
            }
        }
        $error = isset($error) ? $error : '';
        require __DIR__ . '/../views/account/register.php';
    }
} 