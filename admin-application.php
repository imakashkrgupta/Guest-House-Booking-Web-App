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
/*----------------------------------------------------------------*/

/*----------------------------------------------------------------*/

?>

<!---------------------------------->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="cimfr_logo.png" type="image/x-icon">
    <script src="main.js"></script>
    <title>Admin-Applications</title>
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
                <a href="admin-application.php"><div class="nav-links" id="nav-limk-border">Applications</div></a>
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

    <div class="admin-application-wrapper">
        <h2>Pending Applications</h2>
        <div class="admin-application-sub-wrapper">
            <table>
                <tr>
                    <th>Date of Application</th>
                    <th>Name</th>
                    <th>mobile</th>
                    <th>Rooms</th>
                    <th>Organization</th>
                    <th>Date of Arrival</th>
                    <th>Date of Departure</th>
                    <th>Action</th>
                </tr>


<!----------------------------------------------------------------------------->


<?php
$sql = "SELECT id, applicant_name, applicant_date_arrival, applicant_time_arrival, applicant_date_departure, applicant_time_departure, applicant_rooms_required, booking_timestamp, applicant_mobile, applicant_organization FROM `accommodation_booking_details` WHERE booking_status='0'";

        $result = $con->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $row["booking_timestamp"];?></td>
                    <td><?php echo $row["applicant_name"];?></td>
                    <td><?php echo $row["applicant_mobile"];?></td>
                    <td><?php echo $row["applicant_rooms_required"];?></td>
                    <td><?php echo $row["applicant_organization"];?></td>
                    <td><?php echo $row["applicant_date_arrival"];?></td>
                    <td><?php echo $row["applicant_date_departure"];?></td>
                    <td>
                        
                        <a href="admin-application-approve.php?id=<?php echo $row["id"];?>" id="application-approve-btn">Approve</a>

                        <a href="admin-application-provisionally.php?id=<?php echo $row["id"];?>" id="application-prov-btn">Provisionally</a>

                            <a href="admin-application-reject.php?id=<?php echo $row["id"];?>" id="application-reject-btn">Reject</a><br>
                        
                    </td>
                </tr>
            <?php
        }
        } else {
            //MESSAGE TO DISPLAY WHEN NO RESULTS ARE FOUND
        echo "0 results";
        }
        $con->close();

?>
<!------------------------------------------------------------------------------>
            </table>
        </div>
    </div>

    <!----------------------------------------------------------->
</body>
</html>