<?php

$pdo = DbConnect::db_connect();

if (isset($_GET['id'])) {
	$taskId = (int)$_GET['id'];

	$stmt = $pdo->prepare("SELECT is_completed FROM tasks WHERE id = ?");

	$stmt->execute([$taskId]);

    $task = $stmt->fetch(PDO::FETCH_ASSOC);

    // меняем статус
    $newStatus = !$task['is_completed'];

    $stmt = $pdo->prepare("UPDATE tasks SET is_completed = ? WHERE id = ?");
    $stmt->execute([$newStatus, $taskId]);

    header("Location: task");
    exit();
}
