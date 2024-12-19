<?php
require 'BDD/db_connect.php';

if (isset($_POST['todo'])) {
    $title = $_POST['todo']; 
    
    if (!empty($title)) {
        $stmt = $pdo->prepare("INSERT INTO todo (title) VALUES (:title)");
        $stmt->execute([':title' => $title]);
        header('Location: index.php');
        exit;
    } else {
        echo "Le titre est obligatoire.";
    }
}
?>