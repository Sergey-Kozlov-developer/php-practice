<?php

function db_connect()
{
    try {
        $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
            DB_USER, DB_PASSWORD,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // обработка ошибок
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // вкл ассоциативный массив
                PDO::ATTR_EMULATE_PREPARES => false // отключаем эмуляцию подготовленных запросов
            ]

        );

        return $pdo;

    } catch (PDOException $e) {
        error_log($e->getMessage());
        die("Ошибка подключения к базе данных");
    }

}