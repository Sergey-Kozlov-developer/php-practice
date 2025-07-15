<?php

//

//$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

    // получаем данные из формы
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    // проверка на заполненность полей
    $errors = Validate::validate_register_form($_POST);
//    var_dump($errors);
//    die();

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;

    } else {
        try {
            $pdo = DbConnect::db_connect();
            // Проверка существования email
            $checkEmail = $pdo->prepare("SELECT id FROM users WHERE email = ?");
            $checkEmail->execute([$email]);

            if ($checkEmail->fetch()) {
                $_SESSION['errors']['email'] = ["title" => "Этот email уже зарегистрирован"];

            } else {
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                // SQL запрос для вставки данных
                $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
                $stmt = $pdo->prepare($sql);

                $stmt->execute([$name, $email, $passwordHash]);


                $_SESSION['success'][] = ["title" => 'Регистрация прошла успешно! Теперь вы можете войти.'];
                header("Location: " . HOST . "login");
                exit;

            }
        } catch (PDOException $e) {
            error_log("PDO Error: " . $e->getMessage()); // Запись в лог
            $_SESSION['errors'][] = ["title" => 'Ошибка базы данных: '];
            die("Ошибка базы данных: " . $e->getMessage()); // Вывод на экран (для отладки)
        }
    }

}


ob_start();
include ROOT . 'templates/login/register.tpl';
$content = ob_get_contents();
ob_end_clean();

include ROOT . "templates/head/head.tpl";
include ROOT . "templates/header/header.tpl";

echo $content;

include ROOT . "templates/footer/footer.tpl";