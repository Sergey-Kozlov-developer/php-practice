<?php

session_start();
$errors = [];
$success = [];

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


        try{
            $sql = "SELECT id, email, password FROM users WHERE email = :email";
            $stmt = $pdo->prepare($sql);

            $stmt->bindValue('email', $email);

            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);


            if ($user === false) {
                die("неккоректный email или пароль");
            } else {
                $validate_password = password_verify($password, $user['password']);
                if ($validate_password) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['logged_in'] = time();

                    $_SESSION['success'][] ='Вы вошли на сайт';


                    header("Location: about");
                    exit;
                } else {
                    die("Неккоректный пароль");
                }
            }


        } catch (PDOException $e) {
            $errors[] = 'Ошибка базы данных: ' . $e->getMessage();
            $_SESSION['errors'] = $errors;
            error_log("PDO Error: " . $e->getMessage()); // Запись в лог
            die("Ошибка базы данных: " . $e->getMessage()); // Вывод на экран (для отладки)
        }
    }

}









ob_start();
include ROOT . 'templates/login/login.tpl';
$content = ob_get_clean();

include ROOT . "templates/head/head.tpl";
include ROOT . "templates/header/header.tpl";

echo $content;

include ROOT . "templates/footer/footer.tpl";