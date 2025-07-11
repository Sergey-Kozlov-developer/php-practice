<header class="header">


    <div class="container">
        <nav class="navbar">
            <a href="<?=HOST?>" class="logo">Food Exxe Relo</a>
            <ul class="nav-links">
                <li><a href="<?=HOST?>" class="form-control">Главная</a></li>
                <li><a href="<?=HOST?>about" class="form-control">О нас</a></li>

                <?php if (isset($_SESSION['logged_in'])): ?>
                    <li><a href="<?=HOST?>logout">Выйти</a></li>
                <?php else: ?>
                    <li><a href="<?=HOST?>login" class="form-control">Войти</a></li>
                    <li><a href="<?=HOST?>register" class="form-control">Регистрация</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>