<?php
class BaseController {
    protected function render($view, $data = []) {
        extract($data);
        require __DIR__ . '/../views/layout.php';
    }
} 