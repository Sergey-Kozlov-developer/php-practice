<?php


// проверить этот код. не работает. удаляются все пользователи
// Защита от удаления себя
if (isset($_GET['id']) && $_GET['id'] == $_SESSION['user_id']) {
	$_SESSION['errors'][] = ['title' => 'Вы не можете удалить себя'];
	header("Location: users");
	exit;
}

if (isset($_GET['id'])) {

	try {

		$pdo = DbConnect::db_connect();
		$stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
		$stmt->execute([$_GET['id']]);
		$_SESSION['success'][] = ['title' => 'Пользователь удален'];

		header("Location: users");
		exit;
	} catch (PDOException $e) {
		error_log("Ошибка удаления: " . $e->getMessage());
	}
}
