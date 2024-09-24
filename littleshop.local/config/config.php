<?php

// config.php
define('DB_HOST', '127.0.0.1'); 
define('DB_PORT', '3306');
define('DB_NAME', 'littleshop_db');
define('DB_USER', 'littleshop_user');
define('DB_PASS', 'password');
define('DB_CHARSET', 'utf8mb4');


define('BASE_URL', 'http://littleshop.local');
define('IMAGE_URL', BASE_URL . 'resources/images/');

function getPDO() {
    $dsn = "mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    try {
        return new PDO($dsn, DB_USER, DB_PASS, $options);
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
}
?>