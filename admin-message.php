<?php
session_start();
if (! isset($_SESSION['user'])) {
   
    header('location:admin-panel-login.php');

}
if (isset($_POST['logout'])) {
    session_destroy();
    header('location:admin-panel-login.php');
}
include "db_conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="cimfr_logo.png" type="image/x-icon">
    <script src="main.js"></script>
    <title>Admin-Messages</title>
</head>
<body>
    <!------------------------NAV BAR-------------------------->
    <nav>
        <div class="nav-resposnive-wrap">
            <div class="home-nav-sub1">
                <div class="home-nav-sub1-pic"></div>
                <a href="https://cimfr.nic.in/" target="_blank">CSIR-CIMFR</a>
            </div>
            <div class="home-nav-sub2" id="home-nav-sub2-id">
                <a href="admin-dashboard.php"><div class="nav-links">Dashboard</div></a>
                <a href="admin-application.php"><div class="nav-links">Applications</div></a>
                <a href="admin-report.php"><div class="nav-links">Report</div></a>
                
                <a href="admin-message.php"><div class="nav-links" id="nav-limk-border">Messages</div></a>
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
    <div class="admin-message-sec1">
        <h2>Messages</h2>
        <!--------------------->
        <h3>sort By:</h3>
        <div class="admin-message-sort-wrap">
            <form action="" method="post">
            <select name="message_sort" id="">
                <option value="">Select</option>
                <option value="all">All</option>
                <option value="read">Read</option>
                <option value="unread">Unread</option>
            </select>
            <input type="submit" value="apply" class="apply_button" name="apply_button">
            </form>
        </div>
        <!------------------------->
        <div class="admin-message-content-wrapper">
        <!---------*********TABLE*********-------->
        <table>
                <tr>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Actions</th>
                </tr>

<!-------------------------------TABLE DATA------------------------------->

<?php

//FOR READ MESSAGES
if (isset($_POST["apply_button"]) && $_POST["message_sort"]=="read") {
    
    $sql = "SELECT `id`, `name`, `email`, `subject`, `message`, `time_stamp` FROM `contact_message` WHERE message_status='1'";

        $result = $con->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            ?>

                <tr>
                    <td><?php echo $row["time_stamp"];?></td>
                    <td><?php echo $row["name"];?></td>
                    <td><?php echo $row["email"];?></td>
                    <td><?php echo $row["subject"];?></td>
                    <td><?php echo $row["message"];?></td>
                    <td><a href="admin-message-mark-unread.php?id=<?php echo $row["id"];?>">Mark as Unread</a></td>
                </tr>
            <?php
        }
        } else {
            //MESSAGE TO DISPLAY WHEN NO RESULTS ARE FOUND
            ?>
            <script>alert("No Results Found");</script>
            <?php
        }
        $con->close();
}

//FOR UNREAD MESSAGE
elseif (isset($_POST["apply_button"]) && $_POST["message_sort"]=="unread") {
    $sql = "SELECT `id`, `name`, `email`, `subject`, `message`, `time_stamp` FROM `contact_message` WHERE message_status='0'";

        $result = $con->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            ?>

                <tr>
                    <td><?php echo $row["time_stamp"];?></td>
                    <td><?php echo $row["name"];?></td>
                    <td><?php echo $row["email"];?></td>
                    <td><?php echo $row["subject"];?></td>
                    <td><?php echo $row["message"];?></td>
                    <td><a href="admin-message-mark-read.php?id=<?php echo $row["id"];?>">Mark as Read</a></td>
                </tr>
            <?php
        }
        } else {
            //MESSAGE TO DISPLAY WHEN NO RESULTS ARE FOUND
            ?>
            <script>alert("No Results Found");</script>
            <?php
        }
        $con->close();
}

//FOR ALL MESSAGES ON BUTTON CLICK
elseif(isset($_POST["apply_button"]) && $_POST["message_sort"]=="all") {
    $sql = "SELECT `id`, `name`, `email`, `subject`, `message`, `time_stamp`, `message_status` FROM `contact_message` WHERE 1";

        $result = $con->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            ?>

                <tr>
                    <td><?php echo $row["time_stamp"];?></td>
                    <td><?php echo $row["name"];?></td>
                    <td><?php echo $row["email"];?></td>
                    <td><?php echo $row["subject"];?></td>
                    <td><?php echo $row["message"];?></td>
                    <td>
                            <?php 
                            if ($row["message_status"]==0) {
                                ?>
                                <a href="admin-message-mark-read.php?id=<?php echo $row["id"];?>"><?php echo "mark as read"; ?></a>
                                <?php
                                    
                            }else {
                                ?>
                                <a href="admin-message-mark-unread.php?id=<?php echo $row["id"];?> "><?php echo "mark as unread"; ?></a>
                                <?php
                                    
                            }
                            ?>
                       </a>
                    </td>
                </tr>
            <?php
        }
        } else {
            //MESSAGE TO DISPLAY WHEN NO RESULTS ARE FOUND
            ?>
            <script>alert("No Results Found");</script>
            <?php
        }
        $con->close();
}

//FOR ALL MESSAGES AUTOMATIC LOAD
else {
    $sql = "SELECT `id`, `name`, `email`, `subject`, `message`, `time_stamp`, `message_status` FROM `contact_message` WHERE 1";

        $result = $con->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            ?>

                <tr>
                    <td><?php echo $row["time_stamp"];?></td>
                    <td><?php echo $row["name"];?></td>
                    <td><?php echo $row["email"];?></td>
                    <td><?php echo $row["subject"];?></td>
                    <td><?php echo $row["message"];?></td>
                    <td><?php 
                            if ($row["message_status"]==0) {
                                ?>
                                <a href="admin-message-mark-read.php?id=<?php echo $row["id"];?>"><?php echo "mark as read"; ?></a>
                                <?php
                                    
                            }else {
                                ?>
                                <a href="admin-message-mark-unread.php?id=<?php echo $row["id"];?> "><?php echo "mark as unread"; ?></a>
                                <?php
                                    
                            }
                            ?>
                    </td>
                </tr>
            <?php
        }
        } else {
            //MESSAGE TO DISPLAY WHEN NO RESULTS ARE FOUND
            ?>
            <script>alert("No Results Found");</script>
            <?php
        }
        $con->close();
}
?>


<!----------------------------------------------------------------------->
<!------------------------------------------------------------------------>
            </table>
        </div>
        <!--</div>-->
    </div>
</body>
</html>