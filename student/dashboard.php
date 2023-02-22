<?php
    include "../php/dbase_config.php";
    require_once "../php/auth.php";

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="../images/smateo-shs.png">
        <link rel="stylesheet" href="../css/style.css">
        <title>Dashboard</title>

<style>
    .field {
        min-width: 100%;
        height: 10dvh;
        display: flex;
        border: 1px solid black;
        border-radius: 10px;
        align-items: center;
        cursor: default;
    }
    .datetime {
        color: black;
    }
    .chck {
        padding: 10px 25px;
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
        <a href="account.php"><li><img src="../images/user-icon.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Account</h4></li></a>
        <a href="dashboard.php"><li><img src="../images/dashboard (2).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Dashboard</h4></li></a>
        <a href="subjects.php"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Subjects</h4></li></a> 
        <a href="history.php"><li><img src="../images/settings.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">History</h4></li></a>
        <a href="#"><li><img src="../images/help-web-button.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Help</h4></li></a>
        <a href="../php/logout.php"><li><img src="../images/settings.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Log Out</h4></li></a>
    </ul>
</div>
<!-- sidebar -->
  
<!-- Main -->
<div id="main">
    <h2><button class="openbtn" onclick="openNav()">☰</button>&nbsp;&nbsp;Dashboard</h2>  
    <button class="openbtn1" onclick="openNav1()">☰</button>
    <!-- Contents -->
        <div class="dashb_content">
            <hr class="line">       
            <div class="news">
                <h1><img src="../images/announcement.png" style="width: 22px;"> Announcement</h1>
                <br>

                <div class="announcements">
                <?php
                    $sql = mysqli_query($conn, "SELECT * FROM announcement_tbl WHERE archive = 1 ORDER BY date asc") or die ("No events listed!");
                    
                    while($row=mysqli_fetch_array($sql)) {  
                        
                        $date = $row['date']; // Numeric date in YYYY-MM-DD format
                        $date_to_letters = date("M j, Y", strtotime($date)); // Converts numeric date to shorter letter format

                         
                ?>
                    <div class="field">
                        <div class="chck">
                            <input type="checkbox" name="chck" class="chck" />
                        </div>
                        <div class="eventinfo">
                            <h4 class="title"><?php echo $row['title']; ?></h4>
                            <p class="desc"><?php echo $row['description']; ?></p>
                            <p class="datetime"><?php echo $date_to_letters; ?></p>
                        </div>
                    </div>
                    <br>
                <?php
                }
                ?>

                </div>

            </div>
        </div>
    <!-- Contents -->
</div>
<!-- Main -->


  
<script src="../sidebar_nav.js"></script>


</body>
</html>