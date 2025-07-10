<?php

// поиск названия модуля для навигации
function getModuleName(): string
{
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri = trim($uri, '/');
    $uri = filter_var($uri, FILTER_SANITIZE_URL);

    return explode('/', $uri)[0] ?? '';

}