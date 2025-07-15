<?php

class Validate
{

    public static function validate_register_form($data): array
    {
        $errors = [];

        if (empty($data['name'])) {
            $errors['name'] = "Имя обязательно";
        }

        if (empty($data['email'])) {
            $errors['email'] = "Email обязателен";
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Неверный формат email";
        }

        if (empty($data['password'])) {
            $errors['password'] = "Пароль обязателен";
        } elseif (strlen($data['password']) < 6) {
            $errors['password'] = "Пароль не может быть меньше 6 символов";
        }

        return $errors;
    }

    public static function validate_login_form($data): array
    {
        $errors = [];

        if (empty($data['email'])) {
            $errors[] = "Введите email";
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Неверный формат email";
        }

        if (empty($data['password'])) {
            $errors[] = "Пароль обязателен";
        }


        return $errors;

    }
}