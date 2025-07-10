<?php













ob_start();
include ROOT . 'templates/login/login.tpl';
$content = ob_get_clean();

include ROOT . "templates/head/head.tpl";
include ROOT . "templates/header/header.tpl";

echo $content;

include ROOT . "templates/footer/footer.tpl";