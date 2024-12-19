<?php

require_once 'BDD/db_connect.php';

$stmt = $pdo->query("SELECT * FROM todo");
$todos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>TODO List</title>
</head>
<body>
    <h1>Ma TODO Liste</h1>
    <ul>
        <?php foreach ($todos as $todo): ?>
            <li>
                <span><?=$todo['task']?></span>
                <a href="update.php?id=<?= $todo['id'] ?>" class="btn">Modifier</a>
                <a href="delete.php?id=<?= $todo['id'] ?>" class="btn delete">Supprimer</a>
            </li>
        <?php endforeach; ?>
    </ul>
    <form action="add.php" method="POST">
        <input type="text" name="todo" placeholder="Nouvelle tâche" required>
        <button type="submit" class="btn">Ajouter</button>
    </form>
</body>
</html>