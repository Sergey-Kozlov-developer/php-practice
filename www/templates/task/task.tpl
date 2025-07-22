<div class="todo">
    <div class="todo__header">
        <h2 class="todo__title">Мой To-Do List</h2>
    </div>

    <form class="todo__form" action="<?= HOST ?>add-task" method="POST">
        <input class="todo__input" type="text" name="task" placeholder="Новая задача..." required>
        <button class="todo__btn" type="submit">Добавить</button>
    </form>

    <ul class="todo__list">
        <?php foreach ($tasks as $task): ?>
            <li class="todo__item <?= $task['is_completed'] ? 'todo__item--completed' : '' ?>">
                <span class="todo__text"><?= htmlspecialchars($task['task_text']) ?></span>
                <div class="todo__actions">
                    <a class="todo__action todo__action--complete"
                       href="<?= HOST ?>toggle-task?id=<?= $task['id'] ?>">✓</a>
                    <a class="todo__action todo__action--delete"
                       href="<?= HOST ?>delete-task?id=<?= $task['id'] ?>">✕</a>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>