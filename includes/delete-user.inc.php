<?php 

session_start();

if($_SERVER['REQUEST_METHOD'] === "POST") {
    $userId = $_POST['user_id'];

    try {
        require_once('../database/db.php');

        $query = "DELETE FROM users WHERE id = :userId";
        $stmt = $pdo->prepare($query);
        $stmt->execute([':userId' => $userId]);

        $response = [
            'success' => true,
            'message' => 'user deleted'
        ];
        
    } catch (PDOException $e) {
        $response = [
            'success' => false,
            'message' => 'failed to delete user' . $e->getMessage()
        ];
        die("Database error: " . $e->getMessage());
    }

    $_SESSION['response'] = $response;
    header('Location: ../add_user.php');


} else {
    header('location: ../add_user.php');
    die();
}