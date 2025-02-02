<?php

$app = require __DIR__.'/../bootstrap/app.php';

echo 'Welcome to PHP MVC Project!<br>';
echo 'Database Host: ' . $app['config']['host'];
