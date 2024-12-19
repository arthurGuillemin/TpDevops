<?php
require 'BDD/db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM todo WHERE id = ?");
    $stmt->execute([$id]);
    header('Location: index.php'); 
    exit;
} else {
    echo "ID de la tâche non spécifié.";
}
?>
