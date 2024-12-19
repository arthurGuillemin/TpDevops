<?php
require 'BDD/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id']; 
    $title = $_POST['title']; 


    $stmt = $pdo->prepare("UPDATE todo SET task = ? WHERE id = ?");
    $stmt->execute([$title, $id]);

    header('Location: index.php'); 
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $stmt = $pdo->prepare("SELECT * FROM todo WHERE id = ?");
    $stmt->execute([$id]);
    $task = $stmt->fetch(PDO::FETCH_ASSOC);


    if (!$task) {
        echo "Tâche introuvable.";
        exit;
    }
} else {
    echo "ID de la tâche non spécifié.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une tâche</title>
</head>
<body>
    <h1>Modifier une tâche</h1>
    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($task['id']) ?>">
        <input type="text" name="title" value="<?= htmlspecialchars($task['task']) ?>" required>
        <button type="submit">Enregistrer</button>
    </form>
</body>
</html>