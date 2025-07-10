<?php

require_once "config.php";
require_once "db.php";
require_once "functions/all.php";
require_once "functions/validate_register_form.php";
// сессия
$_SESSION['errors'] = array();
$_SESSION['success'] = array();


$uriModule = getModuleName();


switch ($uriModule) {
    case '':
        require(ROOT . 'modules/main/index.php');
        break;

    case 'about':
        require(ROOT . 'modules/about/index.php');
        break;

    case 'login':
        require(ROOT . 'modules/login/login.php');
        break;

    case 'register':
        require(ROOT . 'modules/login/register.php');
        break;


//    default:
//        require(ROOT . 'modules/main/index.php');
//        break;
}



