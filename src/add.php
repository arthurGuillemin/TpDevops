<?php
require 'BDD/db_connect.php';

if (isset($_POST['task'])) {
    $title = $_POST['task']; 
    
    if (!empty($title)) {
        $stmt = $pdo->prepare("INSERT INTO tasks (title) VALUES (:title)");
        $stmt->execute([':title' => $title]);
        header('Location: index.php');
        exit;
    } else {
        echo "Le titre est obligatoire.";
    }
}
?>