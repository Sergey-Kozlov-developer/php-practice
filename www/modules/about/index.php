<?php


ob_start();
include ROOT . 'templates/about/about.tpl';
$content = ob_get_contents();
ob_end_clean();



include ROOT . 'templates/head/head.tpl';
include ROOT . "templates/header/header.tpl";

echo $content;

include ROOT . "templates/footer/footer.tpl";