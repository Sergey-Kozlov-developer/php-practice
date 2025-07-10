<?php
//require_once "./../../config.php";
//
//require_once "./../../templates/head.tpl";

ob_start();
include ROOT . 'templates/main/main.tpl';
$content = ob_get_clean();

include ROOT . "templates/head/head.tpl";
include ROOT . "templates/header/header.tpl";

echo $content;

include ROOT . "templates/footer/footer.tpl";