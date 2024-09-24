<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'Default Title'; ?></title>
    <!-- Including CSS Files -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/static/css/style.css?v=<?= time(); ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/static/css/modal.css">
</head>
<body>
    <header>
        <h1>Little Shop Of Horrors</h1>
        <!-- navigation links -->
        <nav>
        </nav>
    </header>
    
    <!-- Main Content -->
    <main>
        <div id="content">
            <?php echo $content ?? ''; ?>
        </div>
    </main>
    
    <footer>
        <p>&copy; <?= date('Y') ?> Datakiin, Inc.</p>
    </footer>
    <!-- Including JavaScript Files 
    <script src="<?php echo BASE_URL; ?>/static/js/script.js"></script>
    <script src="<?php echo BASE_URL; ?>/static/js/modal.js"></script> -->
</body>
</html>
