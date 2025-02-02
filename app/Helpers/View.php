<?php

use duncan3dc\Laravel\BladeInstance;

if (!function_exists('view')) {
    function view($view, $data = [])
    {
        $views = __DIR__ . '/../Views';
        $cache = __DIR__ . '/../../cache';
        $blade = new BladeInstance($views, $cache);

        return $blade->render($view, $data);
    }
}
