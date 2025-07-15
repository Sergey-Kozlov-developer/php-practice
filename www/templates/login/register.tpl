<section class="auth-container">
    <div class="auth-form">
        <h2>Регистрация</h2>

        <?php include ROOT . "templates/components/errors.tpl"; ?>
        <?php include ROOT . "templates/components/success.tpl"; ?>

        <form action="<?= HOST ?>register" method="POST">
            <div class="form-group">
                <label for="name">Имя</label>
                <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control <?= !empty($_SESSION['errors']['name']) ? 'is-invalid' : '' ?>"
                        value="<?= htmlspecialchars($_POST['name'] ?? '') ?>"
                        required
                >
                <?php if (!empty($_SESSION['errors']['name'])): ?>
                    <div class="invalid-feedback"><?= $_SESSION['errors']['name']['title'] ?></div>
                <?php endif; ?>

            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control <?= !empty($_SESSION['errors']['email']) ? 'is-invalid' : '' ?>"
                        value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                        required
                >
                <?php if (!empty($_SESSION['errors']['email'])): ?>
                    <div class="invalid-feedback"><?= $_SESSION['errors']['email']['title'] ?></div>
                <?php endif; ?>

            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-control <?= !empty($_SESSION['errors']['password']) ? 'is-invalid' : '' ?>"
                        required
                >
                <?php if (!empty($_SESSION['errors']['password'])): ?>
                    <div class="invalid-feedback"><?= $_SESSION['errors']['password']['title'] ?></div>
                <?php endif; ?>

            </div>
            <button type="submit" name="submit" value="submit" class="btn" style="width: 100%;">Зарегистрироваться
            </button>
            <div class="form-footer">
                <p>Уже есть аккаунт? <a href="<?= HOST ?>login">Войдите</a></p>
            </div>
        </form>
    </div>
</section>