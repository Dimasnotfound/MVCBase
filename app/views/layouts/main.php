<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo isset($title) ? $title : "My App"; ?></title>
    <!-- Global CSS -->
    <link rel="stylesheet" href="<?php echo getenv('APP_URL'); ?>/assets/css/style.css">
    <!-- Aset CSS tambahan khusus halaman -->
    <?php if (isset($css) && is_array($css)): ?>
        <?php foreach ($css as $css_file): ?>
            <link rel="stylesheet" href="<?php echo getenv('APP_URL'); ?>/assets/css/<?php echo $css_file; ?>">
        <?php endforeach; ?>
    <?php endif; ?>
</head>
<body>
    <?php echo $content; ?>
    
    <!-- Global JS -->
    <script src="<?php echo getenv('APP_URL'); ?>/assets/js/script.js"></script>
    <!-- Aset JS tambahan khusus halaman -->
    <?php if (isset($js) && is_array($js)): ?>
        <?php foreach ($js as $js_file): ?>
            <script src="<?php echo getenv('APP_URL'); ?>/assets/js/<?php echo $js_file; ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>
