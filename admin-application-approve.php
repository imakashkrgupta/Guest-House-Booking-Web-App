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
$id = $_GET["id"];

$mail_sql = "SELECT * FROM `accommodation_booking_details` WHERE id = $id";
$sql = "UPDATE accommodation_booking_details SET booking_status = '1' WHERE id = $id;";
if (mysqli_query($con, $sql)) {
    ?>
    <script>
        alert("Approved.");
   
    </script>  
<?php

/*------------------------------------*/
        $result = $con->query($mail_sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
            
            $to = $row["applicant_email"];
            }
            $subject = "Update on CIMFR Guest House Booking Request";

            $message = "Dear Applicant\n\nYour Application has been Approved!" . "\n\n" . "Thankyou,\nCIMFR Guest House\nDhanbad";
            
            mail($to,$subject,$message);
            ?>
            <script>
            history.go(-1);
            </script>
           <?php 
        }
}

?>