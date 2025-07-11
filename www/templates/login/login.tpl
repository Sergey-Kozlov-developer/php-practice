<section class="auth-container">
    <div class="auth-form">
        <h2>Вход в систему</h2>

<!--        --><?php //if (!empty($_SESSION['success'])): ?>
<!--            <div class="alert alert-success">-->
<!--                --><?php //= $_SESSION['success'] ?>
<!--                --><?php //unset($_SESSION['success']) ?>
<!--            </div>-->
<!--        --><?php //endif; ?>
<!---->
<!--        --><?php //if (!empty($error)): ?>
<!--            <div class="alert alert-danger">-->
<!--                --><?php //= $error ?>
<!--                --><?php //unset($error) ?>
<!--            </div>-->
<!--        --><?php //endif; ?>

        <form action="<?=HOST?>login" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>"
                        required
                >
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
            </div>
            <button type="submit" name="submit" class="btn" style="width: 100%;">Войти</button>
            <div class="form-footer">
                <p>Ещё нет аккаунта? <a href="<?=HOST?>register">Зарегистрируйтесь</a></p>
            </div>
        </form>
    </div>
</section>