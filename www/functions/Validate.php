<?php

class Validate
{

    public static function validate_register_form($data): array
    {
        $_SESSION['errors'] = [];

        if (empty($data['name'])) {
            $_SESSION['errors'][] = ["title" =>"Имя обязательно"];
        }

        if (empty($data['email'])) {
            $_SESSION['errors'][] = ["title" =>"Email обязателен"];
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['errors'][] = ["title" =>"Неверный формат email"];
        }

        if (empty($data['password'])) {
            $_SESSION['errors'][] = ["title" =>"Пароль обязателен"];
        } elseif (strlen($data['password']) < 6) {
            $_SESSION['errors'][] = ["title" =>"Пароль не может быть меньше 6 символов"];
        }

        return $_SESSION['errors'];
    }

    public static function validate_login_form($data): array
    {
        $errors = [];

        if (empty($data['email'])) {
            $errors[] = ["title" =>"Введите email"];
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = ["title" =>"Неверный формат email"];
        }

        if (empty($data['password'])) {
            $errors[] = ["title" =>"Пароль обязателен"];
        }


        return $errors;

    }
}