<?php

class Controller {
    public function view($viewPath, $data = [])
    {
        extract($data);
        ob_start();
        require_once __DIR__ . '/../views/' . $viewPath . '.php';
        $content = ob_get_clean();
        require_once __DIR__ . '/../views/layouts/main.php';
    }
}
