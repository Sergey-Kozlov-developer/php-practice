<?php



if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['submit'])) {
	// получаем данные полей
	$name = trim($_POST['name']) ?? '';
	$email = trim($_POST['email']) ?? '';
	$password = trim($_POST['password']) ?? '';
	$role = $_POST['role'] ?? 'user';

	$errors = Validate::add_users_form($_POST);

	if (!empty($errors)) {
		$_SESSION['errors'] = $errors;
	} else {

		try {
			$pdo = DbConnect::db_connect();

			// проверка на существующий email
			$checkEmail = $pdo->prepare("SELECT id FROM users WHERE email = ?");
			$checkEmail->execute([$email]);

			if ($checkEmail->fetch()) {
				$_SESSION['errors']['email'] = ["title" => "Такой email уже есть в базе"];
			} else {
				// хешируем пароль
				$passwordHash = password_hash($password, PASSWORD_DEFAULT);
				// запрос на вставку
				$sql = "INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)";
				// подготовка запроса и сам запрос
				$stmt = $pdo->prepare($sql);
				$stmt->execute([$name, $email, $passwordHash, $role]);

				$_SESSION['success'][] = ["title" => 'Регистрация прошла успешно! Теперь вы можете войти.'];
				header("Location:" . HOST . "users");
				exit;
			}
		} catch (PDOException $e) {
			error_log("Ошибка добавления: " . $e->getMessage());
			$_SESSION['errors'][] = ["title" => 'Ошибка базы данных: '];
			die("Ошибка базы данных: " . $e->getMessage()); // Вывод на экран (для отладки)
		}
	}
}













ob_start();
include ROOT . "templates/users/add-users.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . 'templates/head/head.tpl';
include ROOT . "templates/header/header.tpl";

echo $content;
