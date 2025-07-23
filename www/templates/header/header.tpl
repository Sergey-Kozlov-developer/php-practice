<header class="header">


    <div class="container">
        <nav class="navbar">
            <a href="<?= HOST ?>" class="logo">Food Exxe Relo</a>
            <ul class="nav-links">
                <li><a href="<?= HOST ?>">Главная</a></li>
                <li><a href="<?= HOST ?>task">Задачи</a></li>
                <?php if (isset($_SESSION['user_id']) && $_SESSION['logged_in'] === 1): ?>
                    <li><a href="<?= HOST ?>users">Пользователи</a></li>
                <?php endif; ?>

                <?php if (isset($_SESSION['user_id']) && $_SESSION['logged_in'] === 1): ?>
                    <li><a href="<?= HOST ?>logout">Выйти</a></li>
                <?php else: ?>
                    <li><a href="<?= HOST ?>login">Войти</a></li>
                    <li><a href="<?= HOST ?>register">Регистрация</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>