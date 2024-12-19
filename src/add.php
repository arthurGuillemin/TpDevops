<?php
require 'BDD/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title']; 
    if (!empty($title)) {
        $stmt = $pdo->prepare("INSERT INTO tasks (title, status) VALUES (?, 0)");
        $stmt->execute([$title]);
        header('Location: index.php');
        exit;
    } else {
        echo "Le titre est obligatoire.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une tâche</title>
</head>
<body>
    <h1>Ajouter une tâche</h1>
    <form action="add.php" method="POST">
        <input type="text" name="title" placeholder="Titre de la tâche" required>
        <button type="submit
