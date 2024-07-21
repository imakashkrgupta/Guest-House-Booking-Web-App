<?php
//CONNECTION TO DATABASE
include "db_conn.php";
/*--------------------CAPTCHA CODE GENERATE--------------------*/
$captcha_code_generated = $captcha_code_gen = rand(100000, 999999);

/*----------------------------------------------------------------*/
if (isset($_POST["contact_form_submit"])) { //SUBMIT BUTTON CLICKED
    
    //Storing the contact details

    $contact_name = $_POST["contact-input-name"];
    $contact_email = $_POST["contact-input-email"];
    $contact_subject = $_POST["contact-input-sub"];
    $contact_message = $_POST["contact-input-msg"];

    $captcha_entered = $_POST["captcha_value_inserted"]; //USER ENTERED CAPTCHA
    $generated_captchaa = $_POST["generated_captcha"]; //GENERATED CAPTCHA

    
    if ($captcha_entered==$generated_captchaa ) {

        //CHECK IF ALL INPUTS ARE FILLED
        if ($_POST["contact-input-name"] != "" && $_POST["contact-input-email"] != "" && $_POST["contact-input-sub"] != "" && $_POST["contact-input-msg"] != "" ) {
            //ALL INPUTS ARE FILLED

            //CODE TO SEND THE DATA IN DB
            //INSERT QUERY
            $insert_query = "INSERT INTO `contact_message`(`name`, `email`, `subject`, `message`) VALUES ('$contact_name','$contact_email','$contact_subject','$contact_message')";

            $insert_query_exe = mysqli_query($con, $insert_query);
            if ($insert_query_exe) {
                //DATA INSERTED
                ?>
                <script>
                    alert("Data sent!");
                </script>
                <?php
            }
            else {
                //DATA NOT INSERTED
                ?>
                <script>
                    alert("Error: Data Not Sent!");
                </script>
                <?php
            }
        } 
        else {

            // NOT ALL INPUTS ARE FILLED
                ?>
                <script>
                    alert("Enter all the input fields!");
                </script>
                <?php
            
        }
        
    }
    else {

        //WRONG CAPTCHA CODE (Dont send data to DB)
            ?>
            <script>
                alert("Wrong Captcha! Try again.");
            </script>
            <?php
        
    }
}

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
    <title>Contact</title>
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
                <a href="checkbookingstatus.php"><div class="nav-links">Check Status</div></a>

                <a href="contact.php"><div class="nav-links" id="nav-limk-border">Contact</div></a>
            </div>
        </div>
        
        <div id="nav-menu-btn" onclick="menu_btn_clicked()">
            <img width="30" height="30" src="https://img.icons8.com/ios/50/FFFFFF/menu--v1.png" alt="menu--v1"/>
        </div>
    </nav>
    <!---------------------------------------------------->
    <div class="contact-wrapper">
        <h2>Contact</h2>
        <div class="contact-sec1">
            <div class="contact-sec1a">
                <form action="" method="post">
                    <!-- <label>Name:</label><br> -->
                    <input type="text" name="contact-input-name" id="contact-input-name-id" required placeholder="Name"> <br>
                    <!-- <label>Email:</label><br> -->
                    <input type="email" name="contact-input-email" id="contact-input-email-id" required placeholder="Email"><br>
                    <!-- <label>Subject:</label><br> -->
                    <input type="text" name="contact-input-sub" id="contact-input-sub-id" required placeholder="Subject"> <br>
                    <!-- <label>Message:</label><br> -->
                    <textarea name="contact-input-msg" id="contact-input-msg-id" cols="30" rows="10" required placeholder="Message"></textarea> <br>
                    <!---------------CAPTCHA-------------------->
            <div class="captcha-wrapper">
                <label>Captcha:</label>
            <div class="captcha-display">
                <div class="captcha-print">
                    <?php echo $captcha_code_generated;?>
                </div>
                
            </div>
            <!---------captcha extract--------->
            <input type="hidden" name="generated_captcha" value="<?php echo $captcha_code_generated ?>" id="hidden_input">
            <!--------------------------------->
            <input type="text" name="captcha_value_inserted" id="captcha_value_inserted_id" placeholder="Enter captcha" required>
           </div>
           <!------------------------------------------>
                    <input type="submit" value="send" name="contact_form_submit" id="contact-send-id">
                </form>
            </div>
    
            <div class="contact-sec1b">
                <label>Ph No. : </label>
                0326 229 6004 <br>
                <label>Email : </label>
                example@abcexample.com <br> <br>
                <div class="contact-pic"></div>
            </div>
    
        </div>
    
        <div class="contact-sec2">
            <h2>Map Location</h2>

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.222279374393!2d86.42672288045338!3d23.810693623526436!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f6bdd1a26306a3%3A0x7438537f8d0ef013!2sCIMFR%20Guest%20House!5e0!3m2!1sen!2sin!4v1687234566590!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
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
</html>