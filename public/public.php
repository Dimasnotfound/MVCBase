<?php
session_start();

spl_autoload_register(function ($class) {
    if (file_exists('../app/core/' . $class . '.php')) {
        require_once '../app/core/' . $class . '.php';
    } elseif (file_exists('../app/controllers/' . $class . '.php')) {
        require_once '../app/controllers/' . $class . '.php';
    }
});

$app = new App();