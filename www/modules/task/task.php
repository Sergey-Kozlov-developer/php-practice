<?php
require_once ROOT . "config/DbConnect.php";

// получение всх задач

$pdo = DbConnect::db_connect();

$stmt = $pdo->query("SELECT * FROM tasks ORDER BY created_at DESC");
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);


//ob_start();
//include ROOT . 'templates/about/about.tpl';
//$content = ob_get_contents();
//ob_end_clean();

ob_start();
include ROOT . "templates/task/task.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . 'templates/head/head.tpl';
include ROOT . "templates/header/header.tpl";

echo $content;

