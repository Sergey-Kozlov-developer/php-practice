<?php

//
//session_start();
//$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

    // получаем данные из формы
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['name']) ? trim($_POST['email']) : '';
    $password = password_hash((isset($_POST['password'])), PASSWORD_DEFAULT);

    // проверка на заполненность полей
    $errors = Validate::validate_register_form($_POST);

    if (empty($errors)) {
        $pdo = DbConnect::db_connect();

        try {
            // Проверка существования email
            $checkEmail = $pdo->prepare("SELECT id FROM users WHERE email = :email");
            $checkEmail->execute([':email' => $email]);

            if ($checkEmail->fetch()) {
                $_SESSION['errors'][] = ["title" => "Этот email уже зарегистрирован"];
//                $_SESSION['errors'] = $errors;
            } else {
                // SQL запрос для вставки данных
                $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
                $stmt = $pdo->prepare($sql);

                $stmt->bindValue(':name', $name, PDO::PARAM_STR);
                $stmt->bindValue(':email', $email, PDO::PARAM_STR);
                $stmt->bindValue(':password', $password, PDO::PARAM_STR);

                if ($stmt->execute()) {
                    $_SESSION['success'][] = ["title" => 'Регистрация прошла успешно! Теперь вы можете войти.'];
                    header("Location: " . HOST . "login");
                    exit;
                }
            }
        } catch (PDOException $e) {
            $_SESSION['errors'][] = ["title" => 'Ошибка базы данных: '];
            error_log("PDO Error: " . $e->getMessage()); // Запись в лог
            die("Ошибка базы данных: " . $e->getMessage()); // Вывод на экран (для отладки)
        }
    } else {
        $_SESSION['errors'] = [];
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