<?php 

session_start();
if(isset($_SESSION['user'])) header('Location: dashboard.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Inventory Management System</title>
    <link rel="stylesheet" href="css/login.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="container">
        <?php if(isset($_SESSION['login_error_msg'])) { ?>
            <div class="error-login-message">
                <?= htmlentities($_SESSION['login_error_msg']); ?>
            </div>
        <?php } ?>
        <div class="login-header">
            <h1>IMS</h1>
            <h3>Inventory Management System</h3>
        </div>
        <div class="login-body">
            <form action="includes/login.inc.php" method="post">
                <h1>Login</h1>
                <div class="input-group">
                    <label for=username">username</label>
                    <input type="email" name="email" id="">
                </div>
                <div class="input-group">
                    <label for="pwd">Password</label>
                    <input type="password" name="pwd" id="">
                </div>
                <div class="input-group">
                    <button>Login</button>
                </div>
            </form>
        <?php unset($_SESSION['login_error_msg']) ?>

        </div>
    </div>
</body>
</html>