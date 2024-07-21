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
    <title>Admin-Report</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="cimfr_logo.png" type="image/x-icon">
    <script src="main.js"></script>
</head>
<body id="admin_report_body">
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
                <a href="admin-report.php"><div class="nav-links" id="nav-limk-border">Report</div></a>
                
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
    <div class="admin_report_wrapper">
        <h2>Report</h2>
        <form action="" method="post">
            <label>From</label>
            <input type="date" name="admin-report-from-date" id="">
            <label>to</label>
            <input type="date" name="admin-report-to-date" id="">
            <label>Organization:</label>
            <select name="admin-report-org" id="">
                <option value="">select</option>
                <option value="all">ALL</option>
                <option value="AMPRI">AMPRI (Advanced Materials and Processes Research Institute), Bhopal</option>
                <option value="CBRI">CBRI (Central Building Research Institute), ROORKEE</option>
                <option value="CCMB">CCMB (Center for Cellular & Molecular Biology), HYEDRABAD</option>
                <option value="CDRI">CDRI (Center Drug Research Institute), LUCKNOW</option>
                <option value="CECRI">CECRI (Central Electrochemical Research Institute), KARAIKUDI 
                </option>
                <option value="CEERI">CEERI (Central Electronics Engineering Research Institute), PILANI 
                </option>
                <option value="CFTRI">CFTRI (Central Food Technological Research Institute), MYSORE 
                </option>
                <option value="CGCRI">CGCRI (Central Glass & Ceramic Research Institute), KOLKATA 
                </option>
                <option value="CIMAP">CIMAP (Central Institue of Medicinal & Aromatic Plants), LUCKNOW 
                </option>
                <option value="CIMFR">CIMFR (Central Institute of Mining and Fuel Research), DHANBAD
                </option>
                <option value="CLRI">CLRI (Central Leather Research Institute), CHENNAI
                </option>
                <option value="CMERI">CMERI (Central mechanical Engineering Research Institute), DURGAPUR
                </option>
                <option value="C-MMACS">C-MMACS (Center for Mathematical Modelling & Computer Simulation), BANGALORE 
                </option>
                <option value="CRRI">CRRI (Central Road Research Institute), NEW DELHI
                </option>
                <option value="CSIO">CSIO (Central Scientific Instruments Organisation), CHANDIGARH 
                </option>
                <option value="CSIR">CSIR (Council of Scientific and Industrial Research), NEW DELHI 
                </option>
                <option value="CSIR-HRDC">CSIR-HRDC (Human Resource Development Centre), Ghaziabad 
                </option>
                <option value="CSIR-HRDG">CSIR-HRDG (Human Resource Development Group), NEW DELHI</option>
                <option value="CSMCRI">CSMCRI (Central Salt & Marine Chemicals Research Institute), BHAVNAGAR</option>
            </select>
            <input type="submit" value="apply" name="admin-report-form-submit" id="admin-report-form-btn">
        </form>
        
        <div class="admin_report_table_wrap">
            <table id="table_data">
                <!------------------Table Heading------------------->
                <tr>
                    <th>Name</th>
                    <th>No. of Rooms</th>
                    <th>Organization</th>
                    <th>Date of Arrival</th>
                    <th>Date of Departure</th>
                </tr>
                <!-------------------------------------------------->


                <?php

                if (isset($_POST["admin-report-form-submit"])) {

                    if ($_POST["admin-report-from-date"]!="" && $_POST["admin-report-to-date"]!="" && $_POST["admin-report-org"]!="") {

                         //Checking the date difference
                        $d1 = date_create($_POST["admin-report-from-date"]);
                        $d2 = date_create($_POST["admin-report-to-date"]);
                        $diff = date_diff($d1, $d2, false);
                        
                        $date_diff = $diff->invert; 
                        
                        if ($date_diff==0) {
                            //Storing the form data in variables
                    $from_date = $_POST["admin-report-from-date"];
                    $to_date = $_POST["admin-report-to-date"];
                    $org = $_POST["admin-report-org"];
                        
                    //Query To display Data
                    if ($org!="all") {

                        $sql = "SELECT * FROM `accommodation_booking_details` WHERE booking_status='1' AND applicant_organization='$org'
                        AND applicant_date_arrival BETWEEN '$from_date' AND '$to_date'";
                        
                    }
                    else{
                        
                        $sql = "SELECT * FROM `accommodation_booking_details` WHERE booking_status='1' AND applicant_date_arrival BETWEEN '$from_date' AND '$to_date'";
                    }
                    


                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        ?>

                            <tr>
                                <td><?php echo $row["applicant_name"];?></td>
                                <td><?php echo $row["applicant_rooms_required"];?></td>
                                <td><?php echo $row["applicant_organization"];?></td>
                                <td><?php echo $row["applicant_date_arrival"];?></td>
                                <td><?php echo $row["applicant_date_departure"];?></td>
                            </tr>
                        <?php
                        
                    }
                  
                    } else {
                        //MESSAGE TO DISPLAY WHEN NO RESULTS ARE FOUND
                    ?>
                    <script>alert("No results Found");</script>
                    <?php
                    }
                    $con->close();
                        } else {
                            ?>
                           <script>alert("WRONG Date Input Method.");</script>
                           <?php
                        }
                        
                    } else {
                        ?>
                        <script>alert("Enter all the fields");</script>
                        <?php
                    }
                    

                }
    
                ?>
            </table>
        </div>
    </div>
</body>
</html>