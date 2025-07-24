<?php

$pdo = DbConnect::db_connect();

$stmt = $pdo->query("SELECT id, name, email, role FROM users");

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);


// ob_start();
// $content = ob_get_contents();
// ob_end_clean();

include ROOT . 'templates/head/head.tpl';
include ROOT . "templates/header/header.tpl";
include ROOT . "templates/users/users.tpl";

// echo $content;
