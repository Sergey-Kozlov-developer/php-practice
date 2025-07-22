<?php

$pdo = DbConnect::db_connect();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["task"])) {
    $taskText = trim($_POST["task"]); // получаем текст

    // готовим запрос
    $stmt = $pdo->prepare("INSERT INTO tasks (task_text) VALUES (?)");

    $stmt->execute([$taskText]);

    header("Location: task");

}