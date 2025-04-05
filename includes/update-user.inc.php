<?php 

session_start();

if($_SERVER["REQUEST_METHOD"] === "POST") {
        $userId = $_POST['userId'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $now = date('Y-m-d H:i:s');
        
        try {
            require_once('../database/db.php');
            require_once('../includes/functions.php');
            
            if(isInputEmptyThree($first_name,$last_name,$email)) {
                $response = [
                    'success' => false,
                    'message' => 'Need to fill all the fields'
                ];
                $_SESSION['response'] = $response;
                header('location: ../add_user.php');
                exit();
            }

            $query = "UPDATE users SET first_name = :first_name, last_name = :last_name, email = :email, updated_at = :today WHERE id = :userId";
            $stmt = $pdo->prepare($query);

            $stmt->execute([
                ':first_name' => $first_name,
                ':last_name' => $last_name,
                ':email' => $email,
                ':today' => $now,
                ':userId' => $userId
            ]);

            if (!$stmt->execute()) {
                print_r($stmt->errorInfo());
            }

            $response = [
                'success' => true,
                'message' => $first_name . ' ' . $last_name . ' successfully updated'
            ];

        } catch (PDOException $e) {
            $response = [
                'success' => false,
                'message' => 'Failed to update ' . $first_name . ' ' . $last_name . ' to the system. Database error: ' . $e->getMessage()
            ];
            die("Database error: " . $e->getMessage());
        }

        $_SESSION['response'] = $response;
        header('Location: ../add_user.php');

} else {
    header('location: ../add_user.php');
    die();
}