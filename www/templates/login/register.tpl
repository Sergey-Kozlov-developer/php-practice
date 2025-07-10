<section class="auth-container">
    <div class="auth-form">
        <h2>Регистрация</h2>
        <form action="<?=HOST?>register" method="POST">
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Подтвердите пароль</label>
                <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
            </div>
            <button type="submit" class="btn" style="width: 100%;">Зарегистрироваться</button>
            <div class="form-footer">
                <p>Уже есть аккаунт? <a href="<?=HOST?>login">Войдите</a></p>
            </div>
        </form>
    </div>
</section>