<?php
    include "../php/dbase_config.php";
    require_once "../php/auth.php";

?>

<!DOCTYPE html>
<html lang="en">    
<head>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="../images/smateo-shs.png">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/admin.css">
        <title>Sections</title>

</head>

<body>
    

<style type="text/css">

    .row {
        display: flex;
        flex-wrap: wrap;
    }
    .row::after {
        content: "";
        clear: both;
        display: table;
    }
    [class*="col-"] {
        float: left;
        padding: 20px;
    }
    [class*="col-"] {
        width: 100%;
    }
    @media only screen and (min-width: 486px) {
        /* For tablets: */
        .col-s-1 {width: 8.33%;}
        .col-s-2 {width: 16.66%;}
        .col-s-3 {width: 25%;}
        .col-s-4 {width: 33.33%;}
        .col-s-5 {width: 41.66%;}
        .col-s-6 {width: 50%;}
        .col-s-7 {width: 58.33%;}
        .col-s-8 {width: 66.66%;}
        .col-s-9 {width: 75%;}
        .col-s-10 {width: 83.33%;}
        .col-s-11 {width: 91.66%;}
        .col-s-12 {width: 100%;}
    }
    @media only screen and (min-width: 768px) {
        /* For desktop: */
        .col-1 {width: 8.33%;}
        .col-2 {width: 16.66%;}
        .col-3 {width: 25%;}
        .col-4 {width: 33.33%;}
        .col-5 {width: 41.66%;}
        .col-6 {width: 50%;}
        .col-7 {width: 58.33%;}
        .col-8 {width: 66.66%;}
        .col-9 {width: 75%;}
        .col-10 {width: 83.33%;}
        .col-11 {width: 91.66%;}
        .col-12 {width: 100%;}
    }  
</style>
</head>
<body>

<!-- sidebar -->
<div class="side-menu side-menu-admin" id="mySidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <div class="smateo-logo">
        <img src="../images/smateo-shs.png" style="width: 70%;">
    </div>
    <ul>
        <a href="tchr_dashboard.php"><li><img src="../images/dashboard (2).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Dashboard</h4></li></a>
        <a href="tchr_attendance.php"><li><img src="../images/teacher2.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Attendance</h4></li></a>
        <a href="modules.php"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Modules</h4></li></a>
        <a href="links.php"><li><img src="../images/link.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Links</h4></li></a>
        <a href="section.php"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">List of Sections</h4></li></a>
        <a href="#"><li><img src="../images/grade.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Students Grades</h4></li></a>
        <a href="settings.php"><li><img src="../images/settings.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Settings</h4></li></a>
        <a href="../php/logout.php"><li><img src="../images/logout.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Log Out</h4></li></a>
    </ul>
</div>     
<!-- sidebar -->

<!-- Main -->
<div id="main">
    <h2><button class="openbtn" onclick="openNav()">☰</button>&nbsp;&nbsp;Sections</h2>  
        <button class="openbtn1" onclick="openNav1()">☰</button>
    <!-- Contents -->
    <div class="dashb_content">
        <hr class="line">

        <!-- Subjects Contents -->
        <div class="row">
            <?php
            $sql = mysqli_query($conn,"SELECT * FROM teachers_tbl where id = $sess_id");
            while($row=mysqli_fetch_array($sql)) {
            ?>
                <div class="col-3 col-s-12">	
                <form method="GET">
                    <a href="student_list.php?section=<?php echo $row['section'];?>">
                    <div class="subj-card"style="border-radius:25px;">
                        <div class="header" style="border-radius:25px 25px 0px 0px;" > 
                            <h1><?php echo strtoupper ($row['section']); ?></h1>
                        <p><input type="hidden" value="<?php echo ($row['subj_id']); ?>" name="subj_id"></p>
                        
                        </div>
                    </div> 
                    </a>
                </form>
                </div>
            <?php
            } 
            ?>
        </div>
        <!-- Subjects Contents -->



    </div>
    <!-- Contents -->
</div>
<!-- Menu -->


<script src="../sidebar_nav.js"></script>
</body>
</html>