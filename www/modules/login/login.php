<?php

session_start();
$errors = [];
$success = [];

//var_dump($_SESSION);
//die();

if (isset($_POST['submit'])) {
    // получаем данные формы
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    $password = !empty($_POST['password']) ? trim($_POST['password']) : null;

    $err = new Validate();
    $errors = $err->validate_login_form($_POST);

    if (empty($errors)) {
        // подкл к бд
        $db_connect = new DbConnect();
        $pdo = $db_connect->db_connect();


        try {
            $sql = "SELECT id, email, password FROM users WHERE email = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);


            if (!$user) {

                $errors['email'] = "Пользователь с таким email не найден";
            } elseif (!password_verify($password, $user['password'])) {
                $errors['password'] = "Неверный пароль";
            } else {

                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['logged_in'] = time();

                $_SESSION['success'] = 'Вы вошли на сайт';


                header("Location: " . HOST);
                exit;

            }


        } catch (PDOException $e) {
            error_log("Ошибка входа: " . $e->getMessage());

            $errors[] = 'Ошибка базы данных: ';
//            $_SESSION['errors'] = $errors;
//            error_log("PDO Error: " . $e->getMessage()); // Запись в лог
//            die("Ошибка базы данных: " . $e->getMessage()); // Вывод на экран (для отладки)
        }
    }
//    $_SESSION['errors'] = $errors;

}


ob_start();
include ROOT . 'templates/login/login.tpl';
$content = ob_get_clean();

include ROOT . "templates/head/head.tpl";
include ROOT . "templates/header/header.tpl";

echo $content;

include ROOT . "templates/footer/footer.tpl";