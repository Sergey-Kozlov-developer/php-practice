<section class="auth-container">
    <div class="auth-form">
        <h2>Вход в систему</h2>


        <form action="<?=HOST?>login" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn" style="width: 100%;">Войти</button>
            <div class="form-footer">
                <p>Ещё нет аккаунта? <a href="<?=HOST?>register">Зарегистрируйтесь</a></p>
            </div>
        </form>
    </div>
</section>