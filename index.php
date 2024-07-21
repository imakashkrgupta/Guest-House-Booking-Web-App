<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="main.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="cimfr_logo.png" type="image/x-icon">
    
    <title>Home</title>
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
                <a href="index.php"><div class="nav-links" id="nav-limk-border">Home</div></a>
                <a href="accommodation-booking.php"><div class="nav-links">Book Online</div></a>
                <a href="checkbookingstatus.php"><div class="nav-links">Check Status</div></a>
                <!--<a href="#home-sec6-id"><div class="nav-links">FAQ</div></a>-->
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
    <!----------------------HOME SECTION 2----------------------->
    <div class="home-sec2 dec-padding">
        <h2>About</h2>
        <p>
        CSIR- Central Institute Of Mining And Fuel Research
        Guest House Booking System is an Automated guest house booking system.
        People can use this Online system to book guest house present in CSIR-CIMFR, Dhanbad.
        </p>
    </div>
    <!----------------------------------------------->
    <div class="home-sec3 dec-padding">
        <div class="home-sec3a">
            <!--<ul><li>-->
                <h3>Request For Booking Accomodation</h3>
            <!--</li></ul>-->
            <a href="accommodation-booking.php"><button>Book Online</button></a><br><br>

            <!--<ul><li>-->
                <h3>Check Your Booking Status</h3>
            <!--</li></ul>-->
            <a href="checkbookingstatus.php"><button>Check Status</button></a>
        </div>
        <div class="home-sec3b">
            <!--<label>Notice</label>-->
            <!--<div class="home-notice"></div>-->
        </div>
    </div>
    <!-----------------MOVING IMAGES SECTION------------------->

    <!--<div class="moving-imgs-wrapper">
        <div class="moving-img" id="moving-img1"></div>
        <div class="moving-img" id="moving-img2"></div>
        <div class="moving-img" id="moving-img3"></div>
        <div class="moving-img" id="moving-img4"></div>
        <div class="moving-img" id="moving-img5"></div>
        <div class="moving-img" id="moving-img6"></div>
    </div>-->
    <!--------------------------------------------------------->
    <!--------------------------------------------------------->
    <div class="home-sec4 dec-padding">
        <h2>Category-wise Fee Chart</h2>
        <div class="wrapper_feechart">
            <table>
                <!------------------------------------------->
                <tr>
                    <th>
                        SL NO.
                    </th>
                    <th>
                        CATEGORY OF GUEST
                    </th>
                    <th>
                        RATE PER HEAD
                    </th>
                </tr>
                <!---------------------------------------------->
                <tr>
                    <td>
                        1.
                    </td>
                    <td>
                        CSIR Regular Employees, Pensioners and their dependant family members
                    </td>
                    <td>
                        Rs. 50
                    </td>
                </tr>
                <!---------------------------------------------->
                <tr>
                    <td>
                        2.
                    </td>
                    <td>
                        Project Fellow, CSIR-JRF/SRF/RA, Research Students, Scholars working in other CSIR Labs/Hqrs
                    </td>
                    <td>
                        Rs. 50
                    </td>
                </tr>
                <!---------------------------------------------->
                <tr>
                    <td>
                        3.
                    </td>
                    <td>
                        Non-dependant Family members of CSIR Employees/Pensioners
                    </td>
                    <td>
                        Rs. 100
                    </td>
                </tr>
                <!---------------------------------------------->
                <tr>
                    <td>
                        4.
                    </td>
                    <td>
                        [Personal Visit] Friends/Other Relatives/Other Guests of CSIR Employees & Non-CSIR/Other Guests including Parents of JRF/SRF/RA
                    </td>
                    <td>
                        Rs. 300
                    </td>
                </tr>
                <!---------------------------------------------->
                <tr>
                    <td>
                        5.
                    </td>
                    <td>
                        [Official Visit] Expert members/Non-CSIR officials/Invitees/Reviewers/Consultants etc., invited for CSIR/CIMFR work
                    </td>
                    <td>
                        Rs. 1000
                    </td>
                </tr>
                <!---------------------------------------------->
                <tr>
                    <td>
                        6.
                    </td>
                    <td>
                        NRI/Foreign Guests.
                    </td>
                    <td>
                        Rs. 1500
                    </td>
                </tr>
                <!---------------------------------------------->
            </table>
        </div>
    </div>
    <!--------------------------------------------------------->
    <div class="home-sec5 dec-padding">
        <h2>Guidelines</h2>
        <ol>
        <li>Requests for booking accommodation at CSIR-CIMFR Guest House should be invariably submitted online, well in advance with complete details.</li> <br>

<li>The accommodation can be requested/booked for a maximum period of 7 days, subject to availability.</li> <br> 

<li>Beyond 7 days the rates will be doubled for that category in which the guest belongs and billed accordingly.</li> <br>

<li>The applicant is responsible for the correctness/genuineness of each of the guest details.</li> <br>

<li>Provisional confirmation of the booking will be given by E-mail.</li> <br> 

<li>The management may at its discretion, cancel a booking, offer a shared accommodation or offer an alternate accommodation as per availability, without citing any reason.</li> <br>

<li>Any change in the arrival/departure of guests needs to be brought to the notice of Guest House staff immediately by email by mentioning the booking request number.</li> <br>

<li>Verbal/written request for change/extension of dates for accommodation (prefix/suffix) will not be entertained and the same should be separately applied online.</li> <br> 

<li>Based on the room availability and/or at management discretion a decision will be taken and intimated online.</li> <br>

<li>ID proof of the guest mentioned in the online application must be produced at the reception before Check-in.</li> <br> 

<li>ID proofs all the guests are mandatory, except the Distinguished Guests invited by the Director or on behalf of the Director, CSIR-CIMFR, Members of Research Council and other high power committee.</li> <br>

<li>Research Scholar/Project Assistant/Student requiring accommodation for themselves and/or their parents/guests is required to apply online through their Guides/Project Leaders/Supervisors/HOD/mentors who are permanent employees from CSIR.</li> <br>

<li>Booking is not permitted for guests undergoing medical treatment for communicable disease or are bed ridden or who are seriously ill.</li> <br>

<li>Payment towards the Guest House accommodation charges will be accepted only through POS machine (by card swiping) and the transaction charges (if any) incurred towards same will be borne by the guest.</li> <br>

<li>Accommodation and food charges are billed separately and are to be separately settled as per rules.</li> <br>
        </ol>
    </div>
    <!--------------------------------------------------------->
    <div class="home-sec6 dec-padding" id="home-sec6-id">
        <h2>FAQs</h2>
        <ol>
            <h3><li>I am a student from a CSIR lab. Can I apply?</li></h3>
            <p>Yes. PA/JRF/SRF/PhD scholars can apply through their respective supervisor/PL/HOD/mentor/reporting officer who holds a valid CSIR employee ID and an institutional email ID.</p><br>
            <!------------------------>

            <h3><li>Who all are eligible to apply for guest house?</li></h3>
            <p>	One has to be an employee/retired staff of CSIR with a valid employee/pensioner ID to apply for CSIR-CIMFR guest house.
            </p><br>
            <!------------------------>

            <h3><li>I am a guest, who will settle the bill?</li></h3>
            <p>It is the responsibility of the applicant to clearly mention in the online application as who will settle the bill ("Guest"/"Applicant") in the space provided. In case of "CIMFR A/C" necessary approvals from the C.A. are to be submitted/emailed to the email IDs provided below at the time of booking by citing the booking number.</p><br>
            <!------------------------>
            <!------------------------>
        </ol>
    </div>
    <!--------------------------------------------------------->
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