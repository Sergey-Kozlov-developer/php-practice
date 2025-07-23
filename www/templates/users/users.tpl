<div class="container">

	<!-- Кнопки действий (если нужно) -->
	<div class="action-buttons">
		<h1>Список пользователей</h1>
		<?php include ROOT . "templates/components/errors.tpl"; ?>
		<?php include ROOT . "templates/components/success.tpl"; ?>
		<a href="<?= HOST ?>add-users" class="button">Добавить пользователя</a>
	</div>

	<!-- Таблица пользователей -->
	<table class="users-table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Имя</th>
				<th>Email</th>
				<th>Роль</th>
				<th>Действия</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($users as $user): ?>
				<tr>
					<td><?= htmlspecialchars($user['id']) ?></td>
					<td><?= htmlspecialchars($user['name']) ?></td>
					<td><?= htmlspecialchars($user['email']) ?></td>
					<td>
						<span class="role-badge role-<?= strtolower($user['role'] ?? 'user') ?>">
							<?= htmlspecialchars($user['role'] ?? 'user') ?>
						</span>
					</td>
					<td class="actions">
						<a href="edit_user.php?id=<?= $user['id'] ?>" class="button button-edit">✏️</a>
						<a href="delete_user.php?id=<?= $user['id'] ?>" class="button button-delete">🗑️</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>