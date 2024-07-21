<?php
include "db_conn.php";
/*--------------------------------------------------------*/

//APPLICATION NUMBER 
function application_number($gh_name, $applicant_name){
    $gh_l1 = $gh_name[0];
    $gh_l2 = $gh_name[1];
    
    $apl_l1 = strtoupper($applicant_name[0]);
    $apl_l2 = strtoupper($applicant_name[1]);
    
    $today_day = date("d");
    $today_month = date("m");
    $today_year = date("Y");

    date_default_timezone_set('Asia/Kolkata');
    $current_time = date("His");
    
    $application_number = "CIMFR" . "/" . "GH" . "/" . $gh_l1 . $gh_l2 . "/" . $apl_l1 . $apl_l2 . "/" . $today_day .  $today_month .  $today_year . "/" .$current_time ;
     //can echo when when function is called
    return $application_number; //return the application number to the calling function
    }
/*------------------------------------------------------------*/
/*--------------------CAPTCHA CODE GENERATE--------------------*/
$captcha_code_generated = $captcha_code_gen = rand(100000, 999999);

/*----------------------------------------------------------------*/
if (isset($_POST["accommodation_booking_form_submit"])) { //SUBMIT BUTTON CLICKED

    //Validating date (Arrival date can't be before today)
    $d_1 = date_create(date("Y-m-d"));
    $d_2 = date_create($_POST["applicant_arv_date"]);
    $d_diff = date_diff($d_1, $d_2, false);
    $d_date_diff = $d_diff->invert;

    //Checking the date difference
    $d1 = date_create($_POST["applicant_arv_date"]);
    $d2 = date_create($_POST["applicant_dep_date"]);
    $diff = date_diff($d1, $d2, false);
    /*echo $diff->invert;*/
    $date_diff = $diff->invert;


    //STORE FORM DATA INTO VARIABLES
    $applicant_name = $_POST['applicant_name'];
    $applicant_last_name = $_POST['applicant_last_name'];
    $applicant_designation = $_POST["applicant_designation"];
    $applicant_employeeid = $_POST["applicant_employeeid"];
    $applicant_mobile = $_POST["applicant_mobile"];
    $applicant_email = $_POST["applicant_email"];
    $applicant_org = $_POST["applicant_org"];
    $applicant_purpose = $_POST["applicant_purpose"];
    $applicant_arv_date = $_POST["applicant_arv_date"];
    $applicant_arv_time = $_POST["applicant_arv_time"];
    $applicant_dep_date = $_POST["applicant_dep_date"];
    $applicant_dep_time = $_POST["applicant_dep_time"];
    $applicant_total_rooms = $_POST["applicant_total_rooms"];
    $applicant_guesthouse = $_POST["applicant_guesthouse"];
     $applicant_payment_by = $_POST["applicant_payment_by"];
    $applicant_is_guest = $_POST["applicant_is_guest"];

    $guest1_name = $_POST["guest1_name"];
    $guest1_org = $_POST["guest1_org"];
    $guest1_gender = $_POST["guest1_gender"];
    $guest1_age = $_POST["guest1_age"];
    $guest1_mobile = $_POST["guest1_mobile"];
    $guest1_idproof = $_POST["guest1_idproof"];
    $guest1_category = $_POST["guest1_category"];

    $guest2_name = $_POST["guest2_name"];
    $guest2_org = $_POST["guest2_org"];
    $guest2_gender = $_POST["guest2_gender"];
    $guest2_age = $_POST["guest2_age"];
    $guest2_mobile = $_POST["guest2_mobile"];
    $guest2_idproof = $_POST["guest2_idproof"];
    $guest2_category = $_POST["guest2_category"];
    
    $guest3_name = $_POST["guest3_name"];
    $guest3_org = $_POST["guest3_org"];
    $guest3_gender = $_POST["guest3_gender"];
    $guest3_age = $_POST["guest3_age"];
    $guest3_mobile = $_POST["guest3_mobile"];
    $guest3_idproof = $_POST["guest3_idproof"];
    $guest3_category = $_POST["guest3_category"];

    $guest4_name = $_POST["guest4_name"];
    $guest4_org = $_POST["guest4_org"];
    $guest4_gender = $_POST["guest4_gender"];
    $guest4_age = $_POST["guest4_age"];
    $guest4_mobile = $_POST["guest4_mobile"];
    $guest4_idproof = $_POST["guest4_idproof"];
    $guest4_category = $_POST["guest4_category"];

    $guest5_name = $_POST["guest5_name"];
    $guest5_org = $_POST["guest5_org"];
    $guest5_gender = $_POST["guest5_gender"];
    $guest5_age = $_POST["guest5_age"];
    $guest5_mobile = $_POST["guest5_mobile"];
    $guest5_idproof = $_POST["guest5_idproof"];
    $guest5_category = $_POST["guest5_category"];

    $guest6_name = $_POST["guest6_name"];
    $guest6_org = $_POST["guest6_org"];
    $guest6_gender = $_POST["guest6_gender"];
    $guest6_age = $_POST["guest6_age"];
    $guest6_mobile = $_POST["guest6_mobile"];
    $guest6_idproof = $_POST["guest6_idproof"];
    $guest6_category = $_POST["guest6_category"];
    
    $captcha_entered = $_POST["captcha_value_inserted"]; //USER ENTERED CAPTCHA
    $generated_captchaa = $_POST["generated_captcha"]; //GENERATED CAPTCHA

    if ($captcha_entered==$generated_captchaa ) {

        
        //CHECK IF ALL INPUTS ARE FILLED
        if ($_POST["applicant_name"] != "" && $_POST["applicant_designation"] != "" && $_POST["applicant_employeeid"] != "" && $_POST["applicant_mobile"] != "" && $_POST["applicant_email"] != "" && $_POST["applicant_org"] != "" && $_POST["applicant_purpose"] != "" && $_POST["applicant_arv_date"] != "" && $_POST["applicant_arv_time"] != "" && $_POST["applicant_dep_date"] != "" && $_POST["applicant_dep_time"] != "" && $_POST["applicant_total_rooms"] != "" && $_POST["applicant_guesthouse"] != "" && $_POST["applicant_payment_by"] != "" && $_POST["applicant_is_guest"] != "") {
            //ALL INPUTS ARE FILLED

            //VALIDATING MOBILE NUMBER (Should br 10 digits)
            if (strlen(strval($applicant_mobile)) == 10 && strlen(strval($guest1_mobile)) == 10 ) {
                

                    if ($date_diff==0 && $d_date_diff==0) {
                        //GENERATING THE APPLICATION NUMBER
                    $appli_num = application_number($applicant_guesthouse, $applicant_last_name);

                    //CODE TO SEND THE DATA IN DB
                    //INSERT QUERY
                    $insert_query = "INSERT INTO `accommodation_booking_details`(`applicant_name`, `applicant_last_name`, `applicant_designation`, `applicant_employee_id`, `applicant_mobile`, `applicant_email`, `applicant_organization`, `applicant_purpose_of_visit`, `applicant_date_arrival`, `applicant_time_arrival`, `applicant_date_departure`, `applicant_time_departure`, `applicant_rooms_required`, `applicant_guesthouse`, `applicant_payment_by`, `applicant_is_guest`, `guest1_name`, `guest1_organization`, `guest1_gender`, `guest1_age`, `guest1_mobile`, `guest1_id_proof`, `guest1_category`, `guest2_name`, `guest2_organization`, `guest2_gender`, `guest2_age`, `guest2_mobile`, `guest2_id_proof`, `guest2_category`, `guest3_name`, `guest3_organization`, `guest3_gender`, `guest3_age`, `guest3_mobile`, `guest3_id_proof`, `guest3_category`, `guest4_name`, `guest4_organization`, `guest4_gender`, `guest4_age`, `guest4_mobile`, `guest4_id_proof`, `guest4_category`, `guest5_name`, `guest5_organization`, `guest5_gender`, `guest5_age`, `guest5_mobile`, `guest5_id_proof`, `guest5_category`, `guest6_name`, `guest6_organization`, `guest6_gender`, `guest6_age`, `guest6_mobile`, `guest6_id_proof`, `guest6_category`, `application_number`) VALUES ('$applicant_name', '$applicant_last_name', '$applicant_designation','$applicant_employeeid','$applicant_mobile','$applicant_email','$applicant_org','$applicant_purpose','$applicant_arv_date','$applicant_arv_time','$applicant_dep_date','$applicant_dep_time','$applicant_total_rooms','$applicant_guesthouse','$applicant_payment_by','$applicant_is_guest','$guest1_name','$guest1_org','$guest1_gender','$guest1_age','$guest1_mobile','$guest1_idproof','$guest1_category',' $guest2_name','$guest2_org','$guest2_gender','$guest2_age','$guest2_mobile','$guest2_idproof','$guest2_category','$guest3_name','$guest3_org','$guest3_gender','$guest3_age','$guest3_mobile','$guest3_idproof','$guest3_category','$guest4_name','$guest4_org','$guest4_gender','$guest4_age','$guest4_mobile','$guest4_idproof','$guest4_category','$guest5_name','$guest5_org','$guest5_gender','$guest5_age','$guest5_mobile','$guest5_idproof','$guest5_category','$guest6_name','$guest6_org','$guest6_gender','$guest6_age','$guest6_mobile','$guest6_idproof','$guest6_category', '$appli_num')";

                    $insert_query_exe = mysqli_query($con, $insert_query);
                    if ($insert_query_exe) {
                        //DATA INSERTED
                        ?>
                        <script>
                            window.addEventListener('load', function(){
                            swal("Application success!", "Your application number is: <?php echo $appli_num; ?>", "success");
                            });
                        </script>
                        <?php
                        //MAILING FUNCTION [SUCCESSFUL REGUSTRATION]
                        $to = $applicant_email;
                        $subject = "Update on CIMFR Guest House Booking Request";
                        $message = "Dear Applicant,\n" . $applicant_name . " " . $applicant_last_name . "\n\n" . "Your Request for CIMFR Dhanbad Guest House booking has been Registered successfully.\nAnd Your application no. is " . $appli_num . "\n" . "We will be sending you with the further updates regarding your Approval or Rejection of the apllication through the Email" . "\n\n" . "Thankyou,\nCIMFR Guest House\nDhanbad";
                        if (mail($to,$subject,$message)) {
                            ?>
                            <script>
                                //alert("message sent to mail");
                            </script>
                            <?php
                        }
                        else{
                            ?>
                            <script>
                                //alert("message NOT sent to mail");
                            </script>
                            <?php
                        }
                    }
                    else {
                        //DATA NOT INSERTED
                        echo mysqli_error($insert_query_exe);
                        ?>
                        <script>
                            window.addEventListener('load', function(){
                                swal("Error Caused!", "Data is not sent, kindly try again.", "warning");
                            });
                        </script>
                        <?php
                    }

                    }
                    //INVALID DATE (DEPARTURE DATE IS BEFORE ARRIVAL)
                    else {
                        ?>
                        <script>
                        window.addEventListener('load', function(){
                            swal("Invalid Date input method", "Departure date can not be before arrival date.", "warning");
                        });
                        //history.go(-1);
                        </script>
                        <?php
                    }

            } 
            //MOBILE NUMBER IS NOT OF 10 DIGITS
            else {
                ?>
                <script>
                window.addEventListener('load', function(){
                swal("Invalid Mobile Number", "Mobile number should be of 10 digits.", "warning");
                });
                //history.go(-1);
                </script>
                <?php
            }
            

        } 
        else {

            // NOT ALL INPUTS ARE FILLED
                ?>
                <script>
                    window.addEventListener('load', function(){
                swal("Enter all fields", "Kindly enter all the required fields before submitting.", "warning");
                });
                </script>
                <?php
            
        }
        


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


<!------------------------------------------------->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="cimfr_logo.png" type="image/x-icon">
    <title>Accommodation Booking</title>
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
                <a href="index.php"><div class="nav-links">Home</div></a>
                <a href="accommodation-booking.php"><div class="nav-links" id="nav-limk-border">Book Online</div></a>
                <a href="checkbookingstatus.php"><div class="nav-links">Check Status</div></a>
                <a href="contact.php"><div class="nav-links">Contact</div></a>
            </div>
        </div>
        
        <div id="nav-menu-btn" onclick="menu_btn_clicked()">
            <img width="30" height="30" src="https://img.icons8.com/ios/50/FFFFFF/menu--v1.png" alt="menu--v1"/>
        </div>
    </nav>
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
    <!------------------------------------------------------------->
    <div class="booking-sec1">
        <h2>Applicant Details</h2>
            
        <form action="" method="post">
        <div class="booking-sec1-subwrapper1">

            <div class="booking-sec1a">

                
            <label>First Name:</label><span>*</span><br>
            <input type="text" name="applicant_name" id="" required><br>

            <label>Last Name:</label><span>*</span><br>
            <input type="text" name="applicant_last_name" id="" required><br>

            <label>Designation:</label><span>*</span><br>
            <input type="text" name="applicant_designation" id="" required><br>

            <label>Official Employee ID:</label><span>*</span><br>
            <input type="text" name="applicant_employeeid" id="" required><br>

            <label>Mobile No.:</label><span>*</span><br>
            <input type="number" name="applicant_mobile" id="" required><br>

            <label>Official Email:</label><span>*</span><br>
            <input type="email" name="applicant_email" id="" required><br>

            <label>Organization:</label></label><span>*</span><br>
            <select name="applicant_org" id="" required>
                <option value="">select</option>
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
              </select><br>

            <label>Purpose Of Visit:</label><span>*</span><br>
            <select name="applicant_purpose" id="" required>
                <option value="">select</option>
                <option value="personal">Personal</option>
                <option value="official">Official</option>
                <option value="ltc">LTC</option>
              </select><br>


            </div>
            
            <div class="booking-sec1b">


                <label>Date & Time Of Arrival:</label><span>*</span><br>
            <input type="date" name="applicant_arv_date" id="" required><br>
            <input type="time" name="applicant_arv_time" id="" required><br>

            <label>Date & Time Of Departure:</label><span>*</span><br>
            <input type="date" name="applicant_dep_date" id="" required><br>
            <input type="time" name="applicant_dep_time" id="" required> <br>

            <label>Number Of Rooms required:</label><span>*</span><br>
            <select name="applicant_total_rooms" id="" required>
                <option value="">select</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
              </select><br>

              <label>Guest House:</label><span>*</span><br>
            <select name="applicant_guesthouse" id="" required>
                <option value="">select</option>
                <option value="ABHINANDAN">Abhinandan</option>
                <option value="SWAGAT">Swagat</option>
                <option value="SATKAR">Satkar</option>
              </select><br>

            <label>Payment By:</label><span>*</span><br>
            <select name="applicant_payment_by" id="" required>
                <option value="">select</option>
                <option value="applicant">Applicant</option>
                <option value="guest">Guest</option>
                <option value="organization">Organisation</option>
              </select><br>

              <label>Are you one of the guests?</label><span>*</span><br>
            <select name="applicant_is_guest" id="applicant_is_guest_id" required onmouseleave="applicantIsGuest()">
                <option value="">select</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
              </select><br>
            </div>
        </div>

        <h2>Guest Details</h2>
        <div class="booking-sec1-subwrapper2">
            
            <!----------------------------->
            <div class="guest-detail">
                <h3>Guest 1</h3>
            
                <label>Guest Name:</label><span>*</span><br>
            <input type="text" name="guest1_name" id="" ><br>

            <label>Organization:</label><span>*</span><br>
            <select name="guest1_org" id="" >
                <option value="">select</option>
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
            </select><br>
            
            <label>Gender:</label><span>*</span><br>
               <select name="guest1_gender" id="" >
                <option value="">select</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="others">Others</option>
               </select><br> 

            <label>Age:</label><span>*</span><br>
            <input type="number" name="guest1_age" id="" ><br>

            <label>Mobile No.:</label><span>*</span><br>
            <input type="number" name="guest1_mobile" id="" ><br>

            <label>Valid ID Proof:</label><span>*</span><br>
            <input type="text" name="guest1_idproof" id="" ><br>


            <label>Category:</label><span>*</span><br>
            <select name="guest1_category" id="" >
                <option value="">select</option>
                <option value="(a) CSIR Employee (b) CSIR Pensioner">(a) CSIR Employee (b) CSIR Pensioner</option>
                <option value="(c) CSIR Student (PF/JRF/SRF/RA/Scholars)">(c) CSIR Student (PF/JRF/SRF/RA/Scholars)</option>
                <option value="Dependant spouse/child/parent/sibling of (a)/(b)">Dependant spouse/child/parent/sibling of (a)/(b)</option>
                <option value="Non-Dependant spouse/child/parent/sibling of (a)/(b)">Non-Dependant spouse/child/parent/sibling of (a)/(b)</option>
                <option value="Other Relative/Friend/Personal Guest of (a)/(b)">Other Relative/Friend/Personal Guest of (a)/(b)</option>
                <option value="Student Family/Relative/Personal Guest of (c)">Student's Family/Relative/Personal Guest of (c)</option>
                <option value="[Official] Expert/Invitee/Reviewer/Consultant/Non-CSIR official for CSIR/IMMT work">[Official] Expert/Invitee/Reviewer/Consultant/Non-CSIR official for CSIR/IMMT work</option>
                <option value="NRI/Foreign Guest">NRI/Foreign Guest</option>
               </select><br>

            </div>

        <!------------------------------>
              
            <div class="guest-detail">
                <h3>Guest 2</h3>
            
                <label>Guest Name:</label><br>
            <input type="text" name="guest2_name" id=""><br>

            <label>Organization:</label><br>
            <select name="guest2_org" id="">
                <option value="">select</option>
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
            </select><br>
            
            <label>Gender:</label><br>
               <select name="guest2_gender" id="">
                <option value="">select</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="others">Others</option>
               </select><br> 

            <label>Age:</label><br>
            <input type="number" name="guest2_age" id=""><br>

            <label>Mobile No.:</label><br>
            <input type="number" name="guest2_mobile" id=""><br>

            <label>Valid ID Proof:</label><br>
            <input type="text" name="guest2_idproof" id=""><br>


            <label>Category:</label><br>
            <select name="guest2_category" id="">
                <option value="">select</option>
                <option value="(a) CSIR Employee (b) CSIR Pensioner">(a) CSIR Employee (b) CSIR Pensioner</option>
                <option value="(c) CSIR Student (PF/JRF/SRF/RA/Scholars)">(c) CSIR Student (PF/JRF/SRF/RA/Scholars)</option>
                <option value="Dependant spouse/child/parent/sibling of (a)/(b)">Dependant spouse/child/parent/sibling of (a)/(b)</option>
                <option value="Non-Dependant spouse/child/parent/sibling of (a)/(b)">Non-Dependant spouse/child/parent/sibling of (a)/(b)</option>
                <option value="Other Relative/Friend/Personal Guest of (a)/(b)">Other Relative/Friend/Personal Guest of (a)/(b)</option>
                <option value="Students Family/Relative/Personal Guest of (c)">Student's Family/Relative/Personal Guest of (c)</option>
                <option value="[Official] Expert/Invitee/Reviewer/Consultant/Non-CSIR official for CSIR/IMMT work">[Official] Expert/Invitee/Reviewer/Consultant/Non-CSIR official for CSIR/IMMT work</option>
                <option value="NRI/Foreign Guest">NRI/Foreign Guest</option>
               </select><br>

            </div>
           <!---------------------------->
            
             
           <div class="guest-detail">

            <h3>Guest 3</h3>
            
                <label>Guest Name:</label><br>
            <input type="text" name="guest3_name" id=""><br>

            <label>Organization:</label><br>
            <select name="guest3_org" id="">
                <option value="">select</option>
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
            </select><br>
            
            <label>Gender:</label><br>
               <select name="guest3_gender" id="">
                <option value="">select</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="others">Others</option>
               </select><br> 

            <label>Age:</label><br>
            <input type="number" name="guest3_age" id=""><br>

            <label>Mobile No.:</label><br>
            <input type="number" name="guest3_mobile" id=""><br>

            <label>Valid ID Proof:</label><br>
            <input type="text" name="guest3_idproof" id=""><br>


            <label>Category:</label><br>
            <select name="guest3_category" id="">
                <option value="">select</option>
                <option value="(a) CSIR Employee (b) CSIR Pensioner">(a) CSIR Employee (b) CSIR Pensioner</option>
                <option value="(c) CSIR Student (PF/JRF/SRF/RA/Scholars)">(c) CSIR Student (PF/JRF/SRF/RA/Scholars)</option>
                <option value="Dependant spouse/child/parent/sibling of (a)/(b)">Dependant spouse/child/parent/sibling of (a)/(b)</option>
                <option value="Non-Dependant spouse/child/parent/sibling of (a)/(b)">Non-Dependant spouse/child/parent/sibling of (a)/(b)</option>
                <option value="Other Relative/Friend/Personal Guest of (a)/(b)">Other Relative/Friend/Personal Guest of (a)/(b)</option>
                <option value="Students Family/Relative/Personal Guest of (c)">Student's Family/Relative/Personal Guest of (c)</option>
                <option value="[Official] Expert/Invitee/Reviewer/Consultant/Non-CSIR official for CSIR/IMMT work">[Official] Expert/Invitee/Reviewer/Consultant/Non-CSIR official for CSIR/IMMT work</option>
                <option value="NRI/Foreign Guest">NRI/Foreign Guest</option>
               </select><br>

            </div>
           <!---------------------------->

            <!---------------------------->
           
            <div class="guest-detail">
                <h3>Guest 4</h3>
            
                <label>Guest Name:</label><br>
            <input type="text" name="guest4_name" id=""><br>

            <label>Organization:</label><br>
            <select name="guest4_org" id="">
                <option value="">select</option>
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
            </select><br>
            
            <label>Gender:</label><br>
               <select name="guest4_gender" id="">
                <option value="">select</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="others">Others</option>
               </select><br> 

            <label>Age:</label><br>
            <input type="number" name="guest4_age" id=""><br>

            <label>Mobile No.:</label><br>
            <input type="number" name="guest4_mobile" id=""><br>

            <label>Valid ID Proof:</label><br>
            <input type="text" name="guest4_idproof" id=""><br>


            <label>Category:</label><br>
            <select name="guest4_category" id="">
                <option value="">select</option>
                <option value="(a) CSIR Employee (b) CSIR Pensioner">(a) CSIR Employee (b) CSIR Pensioner</option>
                <option value="(c) CSIR Student (PF/JRF/SRF/RA/Scholars)">(c) CSIR Student (PF/JRF/SRF/RA/Scholars)</option>
                <option value="Dependant spouse/child/parent/sibling of (a)/(b)">Dependant spouse/child/parent/sibling of (a)/(b)</option>
                <option value="Non-Dependant spouse/child/parent/sibling of (a)/(b)">Non-Dependant spouse/child/parent/sibling of (a)/(b)</option>
                <option value="Other Relative/Friend/Personal Guest of (a)/(b)">Other Relative/Friend/Personal Guest of (a)/(b)</option>
                <option value="Students Family/Relative/Personal Guest of (c)">Student's Family/Relative/Personal Guest of (c)</option>
                <option value="[Official] Expert/Invitee/Reviewer/Consultant/Non-CSIR official for CSIR/IMMT work">[Official] Expert/Invitee/Reviewer/Consultant/Non-CSIR official for CSIR/IMMT work</option>
                <option value="NRI/Foreign Guest">NRI/Foreign Guest</option>
               </select><br>

            </div>
           <!---------------------------->
           <!---------------------------->
           
             <div class="guest-detail">
                <h3>Guest 5</h3>
            
                <label>Guest Name:</label><br>
            <input type="text" name="guest5_name" id=""><br>

            <label>Organization:</label><br>
            <select name="guest5_org" id="">
                <option value="">select</option>
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
            </select><br>
            
            <label>Gender:</label><br>
               <select name="guest5_gender" id="">
                <option value="">select</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="others">Others</option>
               </select><br> 

            <label>Age:</label><br>
            <input type="number" name="guest5_age" id=""><br>

            <label>Mobile No.:</label><br>
            <input type="number" name="guest5_mobile" id=""><br>

            <label>Valid ID Proof:</label><br>
            <input type="text" name="guest5_idproof" id=""><br>


            <label>Category:</label><br>
            <select name="guest5_category" id="">
                <option value="">select</option>
                <option value="(a) CSIR Employee (b) CSIR Pensioner">(a) CSIR Employee (b) CSIR Pensioner</option>
                <option value="(c) CSIR Student (PF/JRF/SRF/RA/Scholars)">(c) CSIR Student (PF/JRF/SRF/RA/Scholars)</option>
                <option value="Dependant spouse/child/parent/sibling of (a)/(b)">Dependant spouse/child/parent/sibling of (a)/(b)</option>
                <option value="Non-Dependant spouse/child/parent/sibling of (a)/(b)">Non-Dependant spouse/child/parent/sibling of (a)/(b)</option>
                <option value="Other Relative/Friend/Personal Guest of (a)/(b)">Other Relative/Friend/Personal Guest of (a)/(b)</option>
                <option value="Students Family/Relative/Personal Guest of (c)">Student's Family/Relative/Personal Guest of (c)</option>
                <option value="[Official] Expert/Invitee/Reviewer/Consultant/Non-CSIR official for CSIR/IMMT work">[Official] Expert/Invitee/Reviewer/Consultant/Non-CSIR official for CSIR/IMMT work</option>
                <option value="NRI/Foreign Guest">NRI/Foreign Guest</option>
               </select><br>

            </div>
           <!---------------------------->
             
           <div class="guest-detail">

            <h3>Guest 6</h3>
            
                <label>Guest Name:</label><br>
            <input type="text" name="guest6_name" id=""><br>

            <label>Organization:</label><br>
            <select name="guest6_org" id="">
                <option value="">select</option>
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
            </select><br>
            
            <label>Gender:</label><br>
               <select name="guest6_gender" id="">
                <option value="">select</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="others">Others</option>
               </select><br> 

            <label>Age:</label><br>
            <input type="number" name="guest6_age" id=""><br>

            <label>Mobile No.:</label><br>
            <input type="number" name="guest6_mobile" id=""><br>

            <label>Valid ID Proof:</label><br>
            <input type="text" name="guest6_idproof" id=""><br>


            <label>Category:</label><br>
            <select name="guest6_category" id="">
                <option value="">select</option>
                <option value="(a) CSIR Employee (b) CSIR Pensioner">(a) CSIR Employee (b) CSIR Pensioner</option>
                <option value="(c) CSIR Student (PF/JRF/SRF/RA/Scholars)">(c) CSIR Student (PF/JRF/SRF/RA/Scholars)</option>
                <option value="Dependant spouse/child/parent/sibling of (a)/(b)">Dependant spouse/child/parent/sibling of (a)/(b)</option>
                <option value="Non-Dependant spouse/child/parent/sibling of (a)/(b)">Non-Dependant spouse/child/parent/sibling of (a)/(b)</option>
                <option value="Other Relative/Friend/Personal Guest of (a)/(b)">Other Relative/Friend/Personal Guest of (a)/(b)</option>
                <option value="Students Family/Relative/Personal Guest of (c)">Student's Family/Relative/Personal Guest of (c)</option>
                <option value="[Official] Expert/Invitee/Reviewer/Consultant/Non-CSIR official for CSIR/IMMT work">[Official] Expert/Invitee/Reviewer/Consultant/Non-CSIR official for CSIR/IMMT work</option>
                <option value="NRI/Foreign Guest">NRI/Foreign Guest</option>
               </select><br>

            </div>
           <!---------------------------->
        </div>
            <!---------------CAPTCHA-------------------->
            <div class="captcha-wrapper-accomodation-booking">
                <label>Captcha:</label>
            <div class="captcha-display">
                <div class="captcha-print">
                    <?php echo $captcha_code_generated;?>
                </div>
            </div>
            <!---------captcha extract--------->
            <input type="hidden" name="generated_captcha" value="<?php echo $captcha_code_generated ?>">
            <!--------------------------------->
            <input type="text" name="captcha_value_inserted" id="captcha_value_inserted_id" placeholder="Enter captcha" required>
            <input type="submit" name="accommodation_booking_form_submit" value="submit" id="booking-form-submit-id">
           </div> <br>
           <!------------------------------------------>

        </form>
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
    <!--------------------------------------------------->
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
</body>
<!-------------------------------->
<script src="main.js"></script>
<!-------------------------------->
<!-------------------------------->
<script>
    function applicantIsGuest(){
        let applicantIsGuest_value = document.getElementById("applicant_is_guest_id").value;

        if(applicantIsGuest_value == "yes"){
            alert("hn bhai hu mai");
        }
    }
</script>
<!-------------------------------->
</html>