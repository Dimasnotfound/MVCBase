<?php
session_start();

spl_autoload_register(function ($class) {
    if (file_exists(__DIR__ . '/../app/core/' . $class . '.php')) {
        require_once __DIR__ . '/../app/core/' . $class . '.php';
    } elseif (file_exists(__DIR__ . '/../app/controllers/' . $class . '.php')) {
        require_once __DIR__ . '/../app/controllers/' . $class . '.php';
    } elseif (file_exists(__DIR__ . '/../app/models/' . $class . '.php')) {
        require_once __DIR__ . '/../app/models/' . $class . '.php';
    }
});

$app = new App();
