<?php
include "db_conn.php";
/*--------------------CAPTCHA CODE GENERATE--------------------*/
$captcha_code_generated = $captcha_code_gen = rand(100000, 999999);


?>


<!------------------------------------------------->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="cimfr_logo.png" type="image/x-icon">
    <script src="main.js"></script>
    <title>Check Booking Status</title>
</head>
<body>
    <!------------------------------------------------->
       <!------------------------NAV BAR-------------------------->
    <nav>
        <div class="nav-resposnive-wrap">
            <div class="home-nav-sub1">
                <div class="home-nav-sub1-pic"></div>
                <a href="https://cimfr.nic.in/" target="_blank">CSIR-CIMFR</a>
            </div>
            <div class="home-nav-sub2" id="home-nav-sub2-id">
                <a href="index.php"><div class="nav-links">Home</div></a>
                <a href="accommodation-booking.php"><div class="nav-links">Book Online</div></a>
                <a href="checkbookingstatus.php"><div class="nav-links" id="nav-limk-border">Check Status</div></a>
               
                <a href="contact.php"><div class="nav-links">Contact</div></a>
            </div>
        </div>
        
        <div id="nav-menu-btn" onclick="menu_btn_clicked()">
            <img width="30" height="30" src="https://img.icons8.com/ios/50/FFFFFF/menu--v1.png" alt="menu--v1"/>
        </div>
    </nav>
        <!---------------------------------------------------->
        <!---------------------HOME SECTION 1------------------------>
    <div class="home-sec1">
        <div class="home-sec1-blur">
            <div class="home-sec1-blur-cont">
                <div class="home-sec1-blur-cont-pic"></div>
                <div class="home-sec1-blur-cont-write">
                    CSIR- Central Institute Of Mining And Fuel Research <br>
                    Guest House Booking System <br>
                    <span>Dhanbad, Jharkhand</span> 
                </div>
            </div>
        </div>
    </div>
    <!------------------------------------------------------------>
    <div class="checkstatus-wrapper">

        <form action="" method="post">
            <h2>Check Your Booking Status</h2>
            <!-- <label>Email:</label> -->
            <input type="email" name="checkstatus-email" id="checkstatus-email-id" required placeholder="Email">
            <!-- <label>Application Number:</label> -->
            <input type="text" name="chechstatus-applicationnumber" id="chechstatus-applicationnumber-id" required placeholder="Application Number">

            <!---------------CAPTCHA-------------------->
            <div class="captcha-wrapper captcha-wrapper-booking-status">
                <label>Captcha:</label>
            <div class="captcha-display">
                <div class="captcha-print">
                    <?php echo $captcha_code_generated;?>
                </div>
                
            </div>
            <!---------captcha extract--------->
            <input type="hidden" name="generated_captcha" value="<?php echo $captcha_code_generated ?>">
            <!--------------------------------->
            <input type="text" name="captcha_value_inserted" id="captcha_value_inserted_id" placeholder="Enter the captcha code" required>
           </div> 
           <!------------------------------------------>

            <input type="submit" value="submit" name="checkstatus-button" id="checkstatus-button-id">
        </form>
        <div class="status-msg">
            

            <table>
                <tr>
                    <th>Applicant Name</th>
                    <th>Date of Application</th>
                    <th>Rooms</th>
                    <th>Arrival</th>
                    <th>Departure</th>
                    <th>Status</th>
                    <th>Remarks</th>
                </tr>

                <!--------------TABLE DATA------------->

<?php

                /*----------------------------------------------------------------*/
if (isset($_POST["checkstatus-button"])) { //SUBMIT BUTTON CLICKED
    
    $applicant_email = $_POST["checkstatus-email"];
    $application_number = $_POST["chechstatus-applicationnumber"];

    $captcha_entered = $_POST["captcha_value_inserted"]; //USER ENTERED CAPTCHA
    $generated_captchaa = $_POST["generated_captcha"]; //GENERATED CAPTCHA

    if ($captcha_entered==$generated_captchaa ) {

        $sql = "SELECT applicant_name, applicant_date_arrival, applicant_time_arrival, applicant_date_departure, applicant_time_departure, applicant_rooms_required, booking_timestamp, booking_status, booking_remark FROM `accommodation_booking_details` WHERE applicant_email='$applicant_email' AND application_number='$application_number'";

        $result = $con->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            //CHECKING THE BOOKING STATUS
            //0=PENDING
            //1=APPROVED
            //2=PROVISIONALLY
            //3=REJECTED
            if ($row["booking_status"]==0) {
                $booking_status="PENDING";
            }
            elseif ($row["booking_status"]==1) {
                $booking_status="APPROVED";
            }
            elseif ($row["booking_status"]==2) {
                $booking_status="PROVISIONALLY";
            }
            elseif ($row["booking_status"]==3) {
                $booking_status="REJECTED";
            }

            ?>
             <tr>
                    <td><?php echo $row["applicant_name"];?></td>
                    <td><?php echo $row["booking_timestamp"];?></td>
                    <td><?php echo $row["applicant_rooms_required"];?></td>
                    <td><?php echo $row["applicant_date_arrival"];?></td>
                    <td><?php echo $row["applicant_date_departure"];?></td>
                    <td><?php echo $booking_status;?></td>
                    <td><?php echo $row["booking_remark"];?></td>
                </tr>
            <?php
        }
        } else {
            //MESSAGE TO DISPLAY WHEN NO RESULTS ARE FOUND
            ?>
            <script>
                window.addEventListener('load', function(){
                swal("Wrong Credentials", "Kindly re-check your email and application number.", "warning");
                });
            </script>
            <?php
        }
        $con->close();

        ?>
        <?php
    }
    else {

        //WRONG CAPTCHA CODE (Dont send data to DB)
        ?>
            <script>
                window.addEventListener('load', function(){
                swal("Wrong Captcha", "Kindly enter the captcha correctly,", "warning");
                });
            </script>
            <?php
    }
}


?>

            </table>

        </div>
    </div>
    <!----------------------FOOTER------------------------->
    <!----------------------FOOTER------------------------->
    <footer>
        <div class="footer-links-wrap">
            <a href="index.php"><div class="footer-link">Home</div></a>
            <a href="accommodation-booking.php"><div class="footer-link">Book Online</div></a>
            <a href="checkbookingstatus.php"><div class="footer-link">Check Status</div></a>
            
            <a href="contact.php"><div class="footer-link">Contact</div></a>
        </div> <br><br>
        <div class="footer-logo-wrap">
            <div class="footer-logo"></div>
            CSIR- Central Institute Of Mining And Fuel Research <br>
        </div>
        
        All Rights Reserved @CIMFR
    </footer>
</body>
<!----------------EMPTYING ALL FIELDS------------------>
<script>
  if ( window.history.replaceState ) 
  {
    window.history.replaceState( null, null, window.location.href );
  }
</script>
<!----------------------------------------------------->
<!-----------------SWEET ALERT CDN--------------------->
<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">

<!-----------------SWEET ALERT CDN (End)--------------->
</html>