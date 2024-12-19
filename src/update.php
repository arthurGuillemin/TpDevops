<?php
require 'BDD/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id']; 
    $title = $_POST['title']; 
    $status = isset($_POST['status']) ? 1 : 0; 


    $stmt = $pdo->prepare("UPDATE tasks SET title = ?, status = ? WHERE id = ?");
    $stmt->execute([$title, $status, $id]);

    header('Location: index.php'); 
    exit;
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM tasks WHERE id = ?");
    $stmt->execute([$id]);
    $task = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    echo "ID de la tâche non spécifié.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier une tâche</title>
</head>
<body>
    <h1>Modifier une tâche</h1>
    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?= $task['id'] ?>">
        <input type="text" name="title" value="<?= htmlspecialchars($task['title']) ?>" required>
        <label>
            <input type="checkbox" name="status" <?= $task['status'] ? 'checked' : '' ?>> Terminée
        </label>
        <button type="submit">Enregistrer</button>
    </form>
</body>
</html>
