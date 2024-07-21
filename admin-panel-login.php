<?php
session_start();
include "db_conn.php";


if (isset($_POST['login_form_btn'])) 
{
    if ($_POST['admin-login-email']!= "" and $_POST['admin-login-pass']!= "") 
    {
        $l_email=$_POST['admin-login-email'];
        $l_pass=$_POST['admin-login-pass'];
        $email_query = "SELECT * FROM `admin_login` WHERE email='$l_email'";
        $email_count = mysqli_query($con, $email_query);
        if(mysqli_num_rows($email_count)>0)
        {
            $email_pass=mysqli_fetch_assoc($email_count);
            $db_pass=$email_pass['password'];
            $pass_verify=password_verify($l_pass, $db_pass);
            if ($pass_verify) {
                $db_name=$email_pass['name'];
                $_SESSION['user'] = $db_name;
                
                ?>
                <script>
                    location.replace('admin-dashboard.php');
                </script>
                <?php
                
            }
            else{
                //Wrong Password
                // write the code for "wrong pass" msg display
                ?>
                <script>alert("Wrong Password");</script>
                <?php
            }
        }
        else
        {
            //Wrong Email
            // write the code for "wrong email" msg display
                ?>
                <script>alert("Wrong Email");</script>
                <?php
        }

    }
    else 
    {
        //Enter All the Fields
        // write the code for "Enter all fields" msg display
                ?>
                <script>alert("Enter all the fields");</script>
                <?php
    }
}


?>
<!-------------------------------------------------------->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="cimfr_logo.png" type="image/x-icon">
    <title>Admin-Login</title>
</head>
<body class="admin-login-body">
    <form action="" method="post" class="admin-login">
        <h2>Admin Login</h2>
        <label>Email:</label><br>
        <input type="email" name="admin-login-email" id="" required><br>
        <label>Password:</label><br>
        <input type="password" name="admin-login-pass" id="" required><br> <br>
        <input type="submit" value="Login" id="admin-login-btn" name="login_form_btn">
    </form>
</body>
</html>