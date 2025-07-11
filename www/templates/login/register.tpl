<section class="auth-container">
    <div class="auth-form">
        <h2>Регистрация</h2>

        <?php if (!empty($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?= $_SESSION['success'] ?>
                <?php unset($_SESSION['success']) ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($error)): ?>
            <div class="alert alert-danger">
                <?= $error ?>
                <?php unset($error) ?>
            </div>
        <?php endif; ?>

        <form action="<?= HOST ?>register" method="POST">
            <div class="form-group">
                <label for="name">Имя</label>
                <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>"
                        value="<?php echo $_POST['name'] ?? ''; ?>"
                        required
                >
                <?php if (isset($errors['name'])): ?>
                    <div class="invalid-feedback"><?= $errors['name'] ?></div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>"
                        value="<?php echo $_POST['email'] ?? ''; ?>"
                        required
                >
                <?php if (isset($errors['email'])): ?>
                    <div class="invalid-feedback"><?= $errors['email'] ?></div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>"
                        required
                >
                <?php if (isset($errors['password'])): ?>
                    <div class="invalid-feedback"><?= $errors['password'] ?></div>
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