<div class="dashboard-sidebar" id="dashboard-sidebar">
    <h3 class="dashboard-logo" id="dashboard-logo">IMS</h3>
    <div class="dashboard-user">
        <!-- <img src="assets/profile-pic.jpg" alt="" id="dashboard-user-img"> -->
        <img src="assets/jessie.jpg" alt="" id="dashboard-user-img">
        <span id="dashboard-user-name">
            <?= $user['first_name'] . ' ' . $user['last_name'] ?>
        </span>
    </div>
    <div class="dashboard-menu">
        <ul>
            <li>
                <a href="dashboard.php" class="dashboard-link"><i class="fa-solid fa-table-columns"></i><span class="dashboard-link-text">Dashboard</span></a>
            </li>
            <li>
                <a href="add_user.php" class="dashboard-link"><i class="fa-solid fa-user-plus"></i><span class="dashboard-link-text">Add-User</span></a>
            </li>
        </ul>
    </div>
</div>