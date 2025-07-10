<?php

function  validate_register_form($data): array
{
    $errors = array();

    if(empty($data['name'])){
        $errors['name'] = "Name is required";
    }

    if(empty($data['email'])){
        $errors['email'] = "Email is required";
    } elseif(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "Invalid email format";
    }

    if (empty($data['password'])){
        $errors['password'] = "Password is required";
    }

    return $errors;
}