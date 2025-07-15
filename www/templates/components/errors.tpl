<?php

// Проверка что массив $errors НЕ пуст, значит есть ошиьки на вывод
if ( !empty($_SESSION['errors']) && is_array($_SESSION['errors'])):

    // Обходим массив, выводя каждую ошибку
    foreach ($_SESSION['errors'] as $error ):

        // Если в ошибке только заголовок
        if (is_array($error) && isset($error['title'])):
            ?>
            <div class="notifications">
                <div class="notifications__title notifications__title--error">
                    <?php echo htmlspecialchars($error['title']);?>
                </div>
            </div>
        <?php

        endif;
    endforeach;

    $_SESSION['errors'] = [];
endif;
?>