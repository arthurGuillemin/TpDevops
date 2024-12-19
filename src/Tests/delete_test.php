<?php 

require_once(__DIR__ . '../../BDD/db_connect.php');

function deleteTest(){
    global $pdo;

    $stmt = $pdo->query("SELECT * FROM todo");
    $todos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt = $pdo->prepare("INSERT INTO todo (task) VALUES (:title)");
    $stmt->execute([':title' => 'test']);
    $stmt = $pdo->prepare("DELETE FROM todo WHERE task = :title");
    $stmt->execute([':title' => 'test']);
    $stmt = $pdo->query("SELECT * FROM todo");
    $todos3 = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($todos3) == count($todos)) {
        echo "Delete - Test passé \n";
    } else {
        echo "Delete - Test échoué \n";
    }
}

deleteTest();