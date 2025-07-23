<div class="container">
	<h1 class="add-user">Добавить пользователя</h1>

	<?php include ROOT . "templates/components/errors.tpl"; ?>
	<?php include ROOT . "templates/components/success.tpl"; ?>

	<form action="<?= HOST ?>add-users" method="POST" class="user-form">
		<div class="form-group">
			<label for="name">Имя:</label>
			<input type="text" id="name" name="name"
				required
				placeholder="Введите имя"
				class="form-control <?= !empty($_SESSION['errors']['name']) ? 'is-invalid' : '' ?>"
				value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
			<?php if (!empty($_SESSION['errors']['name'])): ?>
				<div class="invalid-feedback"><?= $_SESSION['errors']['name']['title'] ?></div>
			<?php endif; ?>
		</div>

		<div class="form-group">
			<label for="email">Email:</label>
			<input type="email" id="email" name="email"
				placeholder="example@mail.com"
				class="form-control <?= !empty($_SESSION['errors']['email']) ? 'is-invalid' : '' ?>"
				value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
				required>
			<?php if (!empty($_SESSION['errors']['email'])): ?>
				<div class="invalid-feedback"><?= $_SESSION['errors']['email']['title'] ?></div>
			<?php endif; ?>
		</div>
		<div class="form-group">
			<label for="password">Пароль:</label>
			<input type="password" id="password" name="password"
				class="form-control <?= !empty($_SESSION['errors']['password']) ? 'is-invalid' : '' ?>"
				placeholder="Придумайте пароль"
				required>
			<?php if (!empty($_SESSION['errors']['password'])): ?>
				<div class="invalid-feedback"><?= $_SESSION['errors']['password']['title'] ?></div>
			<?php endif; ?>
		</div>

		<div class="form-group">
			<label for="role">Роль:</label>
			<select id="role" name="role" class="form-control">
				<option value="user" <?= ($_POST['role'] ?? '') === 'user' ? 'selected' : '' ?>>Пользователь</option>
				<option value="moderator" <?= ($_POST['role'] ?? '') === 'moderator' ? 'selected' : '' ?>>Модератор</option>
				<option value="admin" <?= ($_POST['role'] ?? '') === 'admin' ? 'selected' : '' ?>>Администратор</option>
			</select>
		</div>

		<div class="form-actions">
			<button type="submit" name="submit" value="submit" class="button button-save">Сохранить</button>
			<a href="<?= HOST ?>users" class="button button-cancel">Отмена</a>
		</div>
	</form>
</div>