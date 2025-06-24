<?php
session_start();
$controller = $_GET['controller'] ?? 'home';
$action = $_GET['action'] ?? 'modernHome';
$controllerName = ucfirst($controller) . 'Controller';
$controllerFile = __DIR__ . '/../controllers/' . $controllerName . '.php';
if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $ctrl = new $controllerName();
    if (method_exists($ctrl, $action)) {
        $ctrl->$action();
        exit;
    }
}
echo '404 Not Found'; 