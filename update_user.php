<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    hello
    <?php 
        if($_SERVER['REQUEST_METHOD'] === "POST") {
            $userId = $_POST['id'];
            
            print_r($userId);
            
        } else {
            header("location: add_user.php");
            die();
        }
    ?>
</body>
</html>