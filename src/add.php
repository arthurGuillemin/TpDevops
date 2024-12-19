<?php
require 'BDD/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['todo'])) {
    $title = $_POST['todo']; 
    
    if (!empty($title)) {
        $stmt = $pdo->prepare("INSERT INTO todo (task) VALUES (:title)");
        $stmt->execute([':title' => $title]);
        header('Location: index.php');
        exit;
    } else {
        echo "Le titre est obligatoire.";
    }
}
?>
