<?php 
    
    session_start();
    if(!isset($_SESSION['user'])) header('Location: login.php');
    $user = $_SESSION['user'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Inventory Management System</title>
    <link rel="stylesheet" href="css/dashboard.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="dashboard-main-container">
            <?php include('partials/app_sidebar.php') ?>
        <div class="dashboard-content-container" id="dashboard-content-container">
                <?php include('partials/app_topnav.php') ?>
            <div class="dashboard-content">
                <div class="dashboard-content-main">
                </div>
            </div>
        </div>
    </div>
    <script type="module" src="js/dashboard.js"></script>    
</body>
</html>