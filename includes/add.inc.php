<?php 

session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    if (isset($_POST['first_name'], $_POST['last_name'], $_POST['pwd'], $_POST['email'])) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];

        
        try {
            require_once('../database/db.php');
            require_once('../includes/functions.php');

            $errors = [];
            $response = [];

            if(isInputEmpty($first_name,$last_name,$email,$pwd)) {
                $response = [
                    'success' => false,
                    'message' => 'Need to fill all the fields'
                ];
                $_SESSION['response'] = $response;
                header('location: ../add_user.php');
                exit();
            }

            if(isEmailTaken($pdo, $email)) {
                $response = [
                    'success' => false,
                    'message' => 'Email is Taken'
                ];
                $_SESSION['response'] = $response;
                header('location: ../add_user.php');
                exit();
            }

            $query = "INSERT INTO users(first_name, last_name, pwd, email) VALUES (:first_name, :last_name, :pwd, :email)";
            $stmt = $pdo->prepare($query);

            $options = [
                'cost' => 12
            ];

            $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

            $stmt->execute([
                ':first_name' => $first_name,
                ':last_name' => $last_name,
                ':pwd' => $hashedPwd,
                ':email' => $email
            ]);

            $response = [
                'success' => true,
                'message' => $first_name . ' ' . $last_name . ' successfully added to the system'
            ];

        } catch (PDOException $e) {
            $response = [
                'success' => false,
                'message' => 'Failed to add ' . $first_name . ' ' . $last_name . ' to the system. Database error: ' . $e->getMessage()
            ];
            die("Database error: " . $e->getMessage());
        }

        $_SESSION['response'] = $response;
        header('Location: ../add_user.php');

    } else {
        header('Location: ../add_user.php');
        die();
    }
} else {
    header('location: ../add_user.php');
    die();
}