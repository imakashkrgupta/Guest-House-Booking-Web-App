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
/*----------------------------------*/
if (isset($_POST["reject-remarks-submit"]) && $_POST["reject-remarks"]!="") {

    $id = $_GET["id"];
    $reject_msg = $_POST["reject-remarks"];


    $sql = "UPDATE accommodation_booking_details SET booking_status = '3' WHERE id = $id;";
    $sql2 = "UPDATE `accommodation_booking_details` SET booking_remark = '$reject_msg' WHERE id = $id;";
    $mail_sql = "SELECT * FROM `accommodation_booking_details` WHERE id = $id";

        if (mysqli_query($con, $sql) && mysqli_query($con, $sql2)) {
            ?>
            <script>
                alert("Rejected");
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

            $message = "Dear Applicant\n\nYour Application has been Rejected! For the following Reason:\n". $reject_msg . "\n\n" . "Thankyou,\nCIMFR Guest House\nDhanbad";
            
            mail($to,$subject,$message);
            ?>
            <script>
            history.go(-2);
            </script>
           <?php 
        }
        }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>admin-application-reject</title>
</head>
<body class="admin-application-reject-body">
    <div class="admin-application-reject-wrapper">
    <h2>Rejection Remarks</h2>
        <form action="" method="post">
            <label>Remarks for Rejection</label><br>
            <textarea id="" cols="30" rows="10" name="reject-remarks"></textarea><br>
            <input type="submit" value="Reject" name="reject-remarks-submit">
        </form>
    </div>
</body>
</html>