<?php
//require_once './../../functions/validate_register_form.php';
//require_once './../../functions/validate_register_form.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // получаем данные из формы
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = password_hash(($_POST['password']), PASSWORD_DEFAULT);
    // проверка на заполненность полей
    $errors = validate_register_form($_POST);
    if (empty($errors)) {
        $pdo = db_connect();

        // подготавливаем запрос
        try {
            // SQL запрос для вставки данных
            $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
            $stmt = $pdo->prepare($sql);

            $stmt->execute([
                $name,
                $email,
                $password
            ]);


            // Успешная регистрация
            $_SESSION['success'] = 'Регистрация прошла успешно! Теперь вы можете войти.';
            header("Location: " . HOST . "login");
            exit;

        } catch (PDOException $e) {
            $errors[] = 'Ошибка базы данных: ' . $e->getMessage();
        }
    }


}







ob_start();
include ROOT . 'templates/login/register.tpl';
$content = ob_get_clean();

include ROOT . "templates/head/head.tpl";
include ROOT . "templates/header/header.tpl";

echo $content;

include ROOT . "templates/footer/footer.tpl";