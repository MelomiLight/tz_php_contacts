<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Телефонный справочник</title>
</head>
<body>
<h1>Телефонный справочник</h1>
<form action="add_contact.php" method="post">
    Имя: <input type="text" name="name" required>
    Телефон: <input type="text" name="phone" required>
    <button type="submit">Добавить</button>
</form>
<ul>
    <?php
        $contacts = json_decode(file_get_contents('contacts.json'), true);
        foreach ($contacts as $index => $contact):
    ?>
    <li>
        <?= htmlspecialchars($contact['name']) ?>: <?= htmlspecialchars($contact['phone']) ?>
        <a href="delete_contact.php?index=<?= $index ?>">Удалить</a>
    </li>
    <?php endforeach; ?>
</ul>
</body>
</html>
