<?php

function getUsers() {
    require_once('database/db.php');

    
    $query = "SELECT * FROM users ORDER BY created_at DESC";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}