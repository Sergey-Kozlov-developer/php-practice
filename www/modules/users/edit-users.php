<?php














ob_start();
include ROOT . "templates/users/edit-users.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . 'templates/head/head.tpl';
include ROOT . "templates/header/header.tpl";

echo $content;
