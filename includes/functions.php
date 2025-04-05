<?php

declare(strict_types=1);

function isInputEmpty(string $first_name, string $last_name, string $pwd, string $email) {
    if(empty($first_name)|| empty($last_name)|| empty($pwd)|| empty($email)) {
        return true;
    } else {
        return false;
    }
}

function isInputEmptyThree(string $first_name, string $last_name, string $email) {
    if(empty($first_name)|| empty($last_name)|| empty($email)) {
        return true;
    } else {
        return false;
    }
}


function isEmailTaken(object $pdo, string $email) {
    if(getEmail($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}

// this are the model which do all the database related query

function getEmail(object $pdo, string $email) {
    $query = "SELECT email FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);

    $stmt->execute([':email' => $email]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

