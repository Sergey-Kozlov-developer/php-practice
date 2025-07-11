<?php


session_start();
$errors = [];

if (isset($_POST['submit'])) {

    // получаем данные из формы
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = password_hash(($_POST['password']), PASSWORD_DEFAULT);

    // проверка на заполненность полей
    $err = new Validate();
    $errors = $err->validate_register_form($_POST);

    if (empty($errors)) {
        $db_connect = new DbConnect();
        $pdo = $db_connect->db_connect();

        try {
            // Проверка существования email
            $checkEmail = $pdo->prepare("SELECT id FROM users WHERE email = :email");
            $checkEmail->execute([':email' => $email]);

            if ($checkEmail->fetch()) {
                $errors['email'] = "Этот email уже зарегистрирован";
                $_SESSION['errors'] = $errors;
            } else {
                // SQL запрос для вставки данных
                $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
                $stmt = $pdo->prepare($sql);

                $stmt->bindValue(':name', $name, PDO::PARAM_STR);
                $stmt->bindValue(':email', $email, PDO::PARAM_STR);
                $stmt->bindValue(':password', $password, PDO::PARAM_STR);

                if ($stmt->execute()) {
                    $_SESSION['success'] = 'Регистрация прошла успешно! Теперь вы можете войти.';
                    header("Location: " . HOST . "login");
                    exit;
                }
            }
        } catch (PDOException $e) {
            $errors[] = 'Ошибка базы данных: ' . $e->getMessage();
            $_SESSION['errors'] = $errors;
            error_log("PDO Error: " . $e->getMessage()); // Запись в лог
            die("Ошибка базы данных: " . $e->getMessage()); // Вывод на экран (для отладки)
        }
    } else {
        $_SESSION['errors'] = $errors;
    }
}


ob_start();
include ROOT . 'templates/login/register.tpl';
$content = ob_get_clean();

include ROOT . "templates/head/head.tpl";
include ROOT . "templates/header/header.tpl";

echo $content;

include ROOT . "templates/footer/footer.tpl";