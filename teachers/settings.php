<?php 
    include '../php/dbase_config.php';
    require_once '../php/auth.php';
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../images/smateo-shs.png">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/teacher.css">
    <script src="../sidebar_nav.js"></script>
    <title>Settings</title>
<style>
    h5 {
        color:rgb(110, 110, 110);
        font-weight: 700;
        font-style: italic;
    }
    .account-sett img {
        height: 200px; 
        width: 200px;
    }
    .account-sett {
        margin-top: 30px;
        align-items: center;
        text-align: center;
    }
    .settings {
        margin-top: 20px;
    }
    .settings h4 {
        color: black;
        font-size: 1em;
        transition: 0.3s;
        text-align: center;
    }
    .settings h4:hover {
        color: white;
        background-color: rgb(110, 110, 110);
        transition: 0.5s;
    }
</style>
</head>
<body>
<!-- sidebar -->
<div class="side-menu" id="mySidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <div class="smateo-logo">
        <img src="../images/smateo-shs.png" style="width: 70%;">
    </div>
    <ul>
        <a href="tchr_dashboard.php"><li><img src="../images/dashboard (2).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Dashboard</h4></li></a>
        <a href="tchr_attendance.php"><li><img src="../images/teacher2.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Attendance</h4></li></a>
        <a href="modules.php"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Modules</h4></li></a>
        <a href="links.php"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Links</h4></li></a>
        <a href="#"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">List of Sections</h4></li></a>
        <a href="#"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Students Grades</h4></li></a>
        <a href="../php/logout.php"><li><img src="../images/settings.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Log Out</h4></li></a>
    </ul>
</div>
<!-- sidebar -->
  
<!-- Main -->
<div id="main">
    <h2><button class="openbtn" onclick="openNav()">☰</button>&nbsp;&nbsp;User Settings</h2>  
    <button class="openbtn1" onclick="openNav1()">☰</button>
    <!-- Contents -->
    <div class="dashb_content">
        <hr class="line">       
        <br>
        <div class="account-sett">
            <center>
                <img src="../images/user.png">
                <div class="usern">
                    <h1><?php echo ucfirst($sess_name); ?></h1>
                    <h5><?php echo $sess_user; ?></h5>
                </div>
            </center>
            <div class="settings">
                <a href="../actions/report.php?id = <?php echo $sess_id; ?>"><li><h4>Report Bugs</h4></li></a>
                <a href="../php/logout.php"><li><h4>Logout</h4></li></a>
            </div>
        </div>
    </div>
    <!-- Contents -->
</div>
<!-- Main -->
 


</body>
</html>