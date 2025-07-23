<div class="container">
	<h1>Редактировать пользователя</h1>

	<form action="update_user.php" method="POST" class="user-form">
		<input type="hidden" name="id" value="<?= $user['id'] ?>">

		<div class="form-group">
			<label for="name">Имя:</label>
			<input type="text" id="name" name="name" value="<?= htmlspecialchars($user['name']) ?>" required>
		</div>

		<div class="form-group">
			<label for="email">Email:</label>
			<input type="email" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
		</div>

		<div class="form-group">
			<label for="role">Роль:</label>
			<select id="role" name="role">
				<option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>>Пользователь</option>
				<option value="moderator" <?= $user['role'] == 'moderator' ? 'selected' : '' ?>>Модератор</option>
				<option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Администратор</option>
			</select>
		</div>

		<div class="form-actions">
			<button type="submit" class="button button-save">Обновить</button>
			<a href="users.php" class="button button-cancel">Отмена</a>
		</div>
	</form>
</div>