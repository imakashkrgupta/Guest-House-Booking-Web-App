<?php

include "db_conn.php";

session_start();
if (! isset($_SESSION['user'])) {
   
    header('location:admin-panel-login.php');

}
if (isset($_POST['logout'])) {
    session_destroy();
    header('location:admin-panel-login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="cimfr_logo.png" type="image/x-icon">
    <script src="main.js"></script>
    <title>Admin-Dashboard</title>
</head>
<body class="admin-dashboard-body">
    <!------------------------NAV BAR-------------------------->
    <nav>
        <div class="nav-resposnive-wrap">
            <div class="home-nav-sub1">
                <div class="home-nav-sub1-pic"></div>
                <a href="https://cimfr.nic.in/" target="_blank">CSIR-CIMFR</a>
            </div>
            <div class="home-nav-sub2" id="home-nav-sub2-id">
                <a href="admin-dashboard.php"><div class="nav-links" id="nav-limk-border">Dashboard</div></a>
                <a href="admin-application.php"><div class="nav-links">Applications</div></a>
                <a href="admin-report.php"><div class="nav-links">Report</div></a>
                
                <a href="admin-message.php"><div class="nav-links">Messages</div></a>
                <a href="admin-panel-create-user.php"><div class="nav-links">Create user</div></a>
                <form action="" method="post">
                <button id="admin-logout-btn" name="logout">Logout</button>
                </form>
                
            </div>
        </div>
        
        <div id="nav-menu-btn" onclick="menu_btn_clicked()">
            <img width="30" height="30" src="https://img.icons8.com/ios/50/FFFFFF/menu--v1.png" alt="menu--v1"/>
        </div>
    </nav>
    <!----------------------------------------------------------->
    <div class="admin-dashboard-main-wrapper">

    
        <div class="admin-dashboard-content-wrapper">
        <div class="admin-dashboard-content admin-dashboard-content1">
                
                <div class="admin-dashboard-content1a admin-dashboard-content-hover">
                <div class="admin-dashboard-pic-outer admin-dashboard-pic-outer1">    
                <div class="admin-dashboard-content1a-notice-pic admin-dashboard-content1a-pic admin-dashboard-content1a-pic1">     
                <h2></h2>
            </div>
                </div>
                <a href="admin-report.php"><div class="admin-dashboard-content1a-notice-write admin-dashboard-content1a-write">Report</div></a>
                </div>
                
                <div class="admin-dashboard-content1b admin-dashboard-content-hover">
                <div class="admin-dashboard-pic-outer admin-dashboard-pic-outer2">    
                    <div class="admin-dashboard-content1a-notice-pic admin-dashboard-content1a-pic admin-dashboard-content1a-pic2">
                    <?php
                    $sql = "SELECT COUNT(*) AS count_unread FROM `contact_message` WHERE message_status='0'";

                    $result = $con->query($sql);
                
                        while($row = mysqli_fetch_assoc($result)) {
                            $count_unread_msg = $row["count_unread"];
                        }

                    ?>
                    <h2> <?php echo $count_unread_msg; ?></h2>
                
                </div>
                </div>    
                <a href="admin-message.php"><div class="admin-dashboard-content1a-notice-write admin-dashboard-content1a-write">Unread Messages</div></a>
                </div>
            </div>
            <div class="admin-dashboard-content admin-dashboard-content2 admin-dashboard-content-hover">
            <div class="admin-dashboard-pic-outer admin-dashboard-pic-outer3">    
                <div class="admin-dashboard-content2-pic">
                <?php
                    $sql = "SELECT COUNT(*) AS count_pending FROM `accommodation_booking_details` WHERE booking_status='0'";

                    $result = $con->query($sql);
                
                        while($row = mysqli_fetch_assoc($result)) {
                            $count_pending_apllication = $row["count_pending"];
                        }

                    ?>    
                <h2><?php echo $count_pending_apllication;?></h2></div>
            </div>    
            <a href="admin-application.php"><div class="admin-dashboard-content2-write">Applications are pending</div></a>
            </div>
        
        </div>

        
    </div>
</body>
</html>