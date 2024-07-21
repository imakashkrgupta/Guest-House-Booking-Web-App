<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="main.js"></script>
    <title>Admin-Notices</title>
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
                <a href="admin-notice.php"><div class="nav-links"  id="nav-limk-border">Notices</div></a>
               
                <a href="admin-message.php"><div class="nav-links">Messages</div></a>
                <button id="admin-logout-btn">Logout</button>
            </div>
        </div>
        
        <div id="nav-menu-btn" onclick="menu_btn_clicked()">
            <img width="30" height="30" src="https://img.icons8.com/ios/50/FFFFFF/menu--v1.png" alt="menu--v1"/>
        </div>
    </nav>
    <!----------------------------------------------------------->
    <div class="admin-notice-sec1">
        <div class="admin-notice-sec1-write">
            <h2>Add New Notice</h2>
            <form action="" method="post">
            <label>Write a Notice</label><br>
            
            <textarea name="add_notice" id="" cols="30" rows="10" required></textarea><br>
            <input type="submit" value="Add Notice" id="add-notice-btn">
            </form>
        </div>
        <div class="admin-notice-sec1-display">
            <div class="notice-displaying">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum vel, maiores officia totam, voluptatibus repellendus dolore deserunt sed quia rem enim ipsum accusamus odio! Nisi?
                <div class="notice-displaying-delete"></div>
            </div>
        </div>
    </div>
</body>
</html>