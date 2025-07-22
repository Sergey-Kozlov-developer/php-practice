<?php

$pdo = DbConnect::db_connect();

if (isset($_GET['id'])) {
    $taskId = (int)$_GET['id'];

    $stmt = $pdo->prepare("DELETE FROM tasks WHERE id = ?");

    $stmt->execute([$taskId]);

    header("Location: task");
    exit();
}