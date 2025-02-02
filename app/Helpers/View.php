<?php

if (!function_exists('view')) {
    function view($view, $data = [])
    {
        $viewPath = __DIR__ . '/../Views/' . str_replace('.', '/', $view) . '.php';

        if (file_exists($viewPath)) {
            extract($data);
            ob_start();
            require $viewPath;
            return ob_get_clean();
        } else {
            return "View '{$view}' not found.";
        }
    }
}
