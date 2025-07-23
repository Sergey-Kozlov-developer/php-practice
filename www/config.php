<?php


define('DB_HOST', "database");
define('DB_NAME', 'foods'); // название БД(которую создали)
define('DB_USER', 'root');
define('DB_PASSWORD', 'tiger');

if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    $protocol = 'https://';
} else {
    $protocol = 'http://';
}

define('HOST', $protocol . $_SERVER['HTTP_HOST'] . '/');
define('ROOT', dirname(__FILE__) . '/');

//session_start();