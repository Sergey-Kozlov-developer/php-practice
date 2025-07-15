<?php

class Validate
{

    public static function validate_register_form($data): array
    {
        $errors = [];

        if (empty($data['name'])) {
            $errors[] = ["title" =>"Имя обязательно"];
        }

        if (empty($data['email'])) {
            $errors[] = ["title" =>"Email обязателен"];
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = ["title" =>"Неверный формат email"];
        }

        if (empty($data['password'])) {
            $errors[] = ["title" =>"Пароль обязателен"];
        } elseif (strlen($data['password']) < 6) {
            $errors[] = ["title" =>"Пароль не может быть меньше 6 символов"];
        }

        return $errors;
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