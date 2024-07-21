<?php
session_start();
include "db_conn.php";

//VALIDATING LOGIN
if (! isset($_SESSION['user'])) {
   
    header('location:admin-panel-login.php');

}
if (isset($_POST['logout'])) {
    session_destroy();
    header('location:admin-panel-login.php');
}

/*----------------------------------------------------------*/

if (isset($_POST['submit'])) 
{
    if ($_POST['username']!= "" and $_POST['email']!= "" and $_POST['password']!= "" and $_POST['cpasswrd']!= "") 
    {
        $name=$_POST['username'];
        $email=$_POST['email'];
        $pass=$_POST['password'];
        $cpass=$_POST['cpasswrd'];    
        
        
        $email_query = "SELECT * FROM `admin_login` WHERE email='$email'";
        $email_count = mysqli_query($con, $email_query);
        if(mysqli_num_rows($email_count)>0)
        {
            
                ?>
                <script>
                    alert("Provided email is alredy in use!");
                </script>
                <?php
        }
        else
        {
            $h_pass=password_hash($pass, PASSWORD_BCRYPT);
            $v_cpass=password_verify($cpass, $h_pass);
        if ($v_cpass) 
        {

            $insert_query="INSERT INTO `admin_login`(`name`, `email`, `password`) VALUES ('$name','$email','$h_pass');";

            $insert_query_exe = mysqli_query($con, $insert_query);
            if($insert_query_exe)
            {
                
                ?>
                <script>
                    alert("New User Login Credentials created Successfully!");
                </script>
                <?php
                
            }
        }
        else
        {
           
                ?>
                <script>
                    alert("Password and Confirm Password does not match.");
                </script>
                <?php
        }
        }
        
        
    }
    else if ($_POST['username']=="" or $_POST['email']=="" or $_POST['password']=="" or $_POST['cpasswrd']=="")
    {
       
                ?>
                <script>
                    alert("Enter all the fields.");
                </script>
                <?php
    }
        
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-create user</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="cimfr_logo.png" type="image/x-icon">
    <script src="main.js"></script>
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
                
                <a href="admin-message.php"><div class="nav-links">Messages</div></a>
                <a href="admin-panel-create-user.php"><div class="nav-links" id="nav-limk-border">Create user</div></a>
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
    <div class="admin-panel-create-user">
        <form action="" method="post">
        <h2>Create New User</h2>
            <!-- <label>Name:</label><br> -->
            <input type="text" name="username" id="" required placeholder="Name"><br>
            <!-- <label>Email:</label><br> -->
            <input type="email" name="email" id="" required placeholder="Email"><br>
            <!-- <label>Password:</label><br> -->
            <input type="password" name="password" id="" required placeholder="Password"><br>
            <!-- <label>Confirm Password:</label><br> -->
            <input type="password" name="cpasswrd" id="" required placeholder="Confirm Password"><br>
            <input type="submit" name="submit" value="create" id="admin-create-user-btn">
        </form>
    </div>
    <!-------------------Active user Credentials------------------------>
    <div class="admin-panel-create-user-active-user-wrapper">
        <div class="admin-panel-create-user-active-user-wrapper2">
      
            <table class="admin_panel_user_list_table">
                <tr>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                <!--------------------------------------->
                <?php
                $sql = "SELECT * FROM `admin_login`";
                $result = $con->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row["email"];?></td>
                    <td>
                        <a href="admin-panel-create-user-delete-user.php?id=<?php echo $row["id"];?>" class="delete_dashboard_user">Delete user</a>
                    </td>
                </tr>
                <?php
                }
            }
                ?>
                <!--------------------------------------->
            </table>
                  
        </div>
    </div>
</body>
</html>