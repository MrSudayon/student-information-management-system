<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="icon" href="../images/smateo-shs.png">
        <title>Teachers</title>
    </head>

<body>
<!-- sidebar -->
<div class="side-menu" id="mySidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <div class="smateo-logo">
        <img src="../images/smateo-shs.png" style="width: 70%;">
    </div>
    <ul >
        <a href="account.php"><li><img src="../images/user-icon.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Account</h4></li></a>
        <a href="dashboard.php"><li><img src="../images/dashboard (2).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Dashboard</h4></li></a>
        <a href="subjects.php"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Subjects</h4></li></a> <!--Modules?-->
        <!-- Selected -->
        <a href="teachers.php"><li><img src="../images/teacher2.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Teachers</h4></li></a><!--Profs,Instructor..?-->
        <a href="history.php"><li><img src="../images/settings.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">History</h4></li></a>
        <a href="#"><li><img src="../images/help-web-button.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Help</h4></li></a>
    </ul>
</div>
<!-- sidebar -->


<!-- Main -->
<div id="main">
    <h2><button class="openbtn" onclick="openNav()">☰</button>&nbsp;&nbsp;Messages</h2>
    <button class="openbtn1" onclick="openNav1()">☰</button> 
    <!-- Contents -->
    <div class="dashb_content">
        <hr class="line">       

        <div class="right">
            <div class="compose-msg">
                <button> Compose </button>
            </div>
            <div class="delete">
                <button> Delete </button>
            </div>
            <div class="msg-settings">
                <button> Settings </button>
            </div>
            <div class="search">
                <input type="search">
                <button type="submit">Search</button>
            </div>
        </div>
            
            
            <!--
        <div class="compose-msg">
            <a href="" class="compose"><img src="../images/compose_msg.png"></a>
        </div>
            -->
    </div>
    <!-- Contents -->
</div>
<!-- Menu -->
<script src="../sidebar_nav.js"></script>
</body>
</html>