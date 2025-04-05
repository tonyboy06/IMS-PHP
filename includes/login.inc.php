<?php

session_start();
$error_msg = '';

if($_SERVER['REQUEST_METHOD'] === "POST") {
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    require_once('../database/db.php');

    try {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $pdo->prepare($query);
        $stmt->execute([':email' => $email]);

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            // $hashedPwdFromDB = $user['pwd'];

            $pwdVerify = $pwd === $user['pwd'];

            if($pwdVerify) {
                $_SESSION['user'] = $user;
                header('Location: ../dashboard.php');
                exit();
            } else {
                $_SESSION['login_error_msg'] = 'Incorrect Password!';
                header('Location: ../dashboard.php');
                exit();
            }
        } else {
            $_SESSION['login_error_msg'] = 'User not found!';
            header('Location: ../login.php');
            exit();
        }


    } catch (PDOException $e) {
        die("Query connection failed " . $e->getMessage());
    }

} else {
    header('Location: ../login.php');
    die();
}