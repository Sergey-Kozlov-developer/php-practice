<?php


const DB_HOST = 'database';
const DB_NAME = 'foods';
const DB_USER = 'root';
const DB_PASSWORD = 'tiger';

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){
    $protocol = 'https://';
} else {
    $protocol = 'http://';
}

define('HOST', $protocol . $_SERVER['HTTP_HOST'] . '/');
define('ROOT', dirname(__FILE__) . '/');

session_start();