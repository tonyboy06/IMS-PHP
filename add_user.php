<?php 
    
    session_start();
    if(!isset($_SESSION['user'])) header('Location: login.php');
    $user = $_SESSION['user'];

// this will add the getUsers() function to return a result of all the users in the database
    include('includes/show-users.inc.php');
    $users = getUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Inventory Management System</title>
    <link rel="stylesheet" href="css/dashboard.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/modal.css">
</head>
<body>
    <div class="dashboard-main-container">
            <?php include('partials/app_sidebar.php') ?>
        <div class="dashboard-content-container" id="dashboard-content-container">
                <?php include('partials/app_topnav.php') ?>
            <div class="dashboard-content">
                <div class="dashboard-content-main">
                    <div class="add-user-row">
                        <div class="column col-5">
                            <h3 class="user-table-header"><i class="fa-solid fa-user-plus"></i>Add User</h3>
                            <form action="includes/add.inc.php" method="post" class="appForm">
                                <div class="input-group">
                                    <label for="first_name">first name</label>
                                    <input type="text" name="first_name">
                                </div>
                                <div class="input-group">
                                    <label for="first_name">last name</label>
                                    <input type="text" name="last_name">
                                </div>
                                <div class="input-group">
                                    <label for="email">e-mail</label>
                                    <input type="email" name="email">
                                </div>
                                <div class="input-group">
                                    <label for="pwd">password</label>
                                    <input type="password" name="pwd">
                                </div>
                                <button>Add User</button>
                            </form>
                            <?php
                                if (isset($_SESSION['response'])) {
                                    $response_msg = $_SESSION['response']['message'];
                                    $is_success = $_SESSION['response']['success'];
                                    ?>

                                    <div class="response-msg">
                                        <p class="<?= $is_success ? 'response-msg-success' : 'response-msg-error' ?>">
                                            <?= htmlentities($response_msg); ?>
                                        </p>
                                    </div>
                                    
                                    <?php
                                    unset($_SESSION['response']);
                                } else {
                                    $response_msg = '';
                                    $is_success = '';
                                }
                            ?>
                        </div>
                        <div class="column col-7">
                            <h3 class="user-table-header"><i class="fa-solid fa-list"></i>List of Users</h3>
                            <table class="user-table">
                                <tr>
                                    <th>No.</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>created at</th>
                                    <th>updated at</th>
                                    <th>action</th>
                                </tr>
                                <?php foreach($users as $index => $user) { ?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
                                        <td><?= $user['first_name'] ?></td>
                                        <td><?= $user['last_name'] ?></td>
                                        <td><?= $user['email'] ?></td>
                                        <td><?= date('M d, Y @ h:i:s A', strtotime($user['created_at'])) ?></td>
                                        <td><?= date('M d, Y @ h:i:s A', strtotime($user['updated_at'])) ?></td>
                                        <td>
                                            <form action="includes/delete-user.inc.php" method="post" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                                <button>Delete</button>
                                            </form>
                                                <button id="myBtn">edit</button>
                                                <div id="myModal" class="modal">
                                                    <div class="modal-content">
                                                        <span class="close">&times;</span>
                                                        <h3>UPDATE USER</h3>
                                                        <form action="includes/update-user.inc.php" method="post">
                                                            <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                                            <div class="input-group">
                                                                <label for="first_name">first name</label>
                                                                <input type="text" name="first_name" value="<?= $user['first_name'] ?>">
                                                            </div>
                                                            <div class="input-group">
                                                                <label for="first_name">last name</label>
                                                                <input type="text" name="last_name" value="<?= $user['last_name'] ?>">
                                                            </div>
                                                            <div class="input-group">
                                                                <label for="email">e-mail</label>
                                                                <input type="email" name="email" value="<?= $user['email'] ?>">
                                                            </div>
                                                            <button>update</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            <form action="update_user.php" method="post">
                                                
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </table>
                            <p class="user-total"><?=  count($users) ?> Users</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="module" src="js/dashboard.js"></script>    
    <script type="module" src="js/modal.js"></script>    
</body>
</html>