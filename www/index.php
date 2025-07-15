<?php

session_start();
require_once ('./config.php');
require_once ("./functions/all.php");


// сессия
if (!isset($_SESSION['errors'])) {

    $_SESSION['errors'] = [];
}

if (!isset($_SESSION['success'])) {

    $_SESSION['success'] = [];
}


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

    case 'logout':
        require(ROOT . 'modules/login/logout.php');
        break;


//    default:
//        require(ROOT . 'modules/main/index.php');
//        break;
}



