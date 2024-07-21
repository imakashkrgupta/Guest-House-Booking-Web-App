/*-----------------------------MENU BUTTON----------------------------*/
let menu_btn_click_count = 1;
function menu_btn_clicked(){
    
    if (menu_btn_click_count % 2 !=0) {
        document.getElementById("home-nav-sub2-id").style.display="block";
    } else {
        document.getElementById("home-nav-sub2-id").style.display="none";
    }
    menu_btn_click_count = menu_btn_click_count + 1;
}
/*--------------------------------------------------------------------*/

/*--------------------------MOVING IMAGES-----------------------------*/
let moving_img_id_count=1;
setInterval(moving_imgs, 3000);

function moving_imgs(){

    //DISPLAY NONE OF ALL IMAGES

    document.getElementById("moving-img1").style.display="none";
    document.getElementById("moving-img2").style.display="none";
    document.getElementById("moving-img3").style.display="none";
    document.getElementById("moving-img4").style.display="none";
    document.getElementById("moving-img5").style.display="none";
    document.getElementById("moving-img6").style.display="none";

    //DISPLAY BLOCK OF ONE IMAGE AT A TIME

    document.getElementById("moving-img"+moving_img_id_count).style.display="block";
   
    //IF THE COUNT GOES >6 THEN IT WILL RESET THE COUNT AT 1
    moving_img_id_count = moving_img_id_count + 1;
    if (moving_img_id_count >= 7) {
        moving_img_id_count = 1;
    }
}
/*--------------------------------------------------------------------*/

/*---------------------------------------------------------*/
function applicantIsGuest(){
    let applicantIsGuest_value = document.getElementById("applicant_is_guest_id").value;
    alert("hn bhai hu maiknwakdnwj");

    if(applicantIsGuest_value == "yes"){
        alert("hn bhai hu mai");
    }
}
    