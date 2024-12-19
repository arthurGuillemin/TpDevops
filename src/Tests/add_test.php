<?php 

require_once(__DIR__ . '../BDD/db_connect.php');
function addTest(){
    global $pdo;

    $stmt = $pdo->query("SELECT * FROM todo");
    $todos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt = $pdo->prepare("INSERT INTO todo (task) VALUES (:title)");
    $stmt->execute([':title' => 'test']);
    $stmt = $pdo->query("SELECT * FROM todo");
    $todos2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($todos2) == count($todos) + 1) {
        echo "Add - Test passé \n";
    } else {
        echo "Add - Test échoué \n";
    }

    $stmt = $pdo->prepare("DELETE FROM todo WHERE task = :title");
    $stmt->execute([':title' => 'test']);
}

addTest();