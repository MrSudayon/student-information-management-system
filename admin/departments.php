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
        <link rel="stylesheet" href="../css/admin.css">
        <title>Departments</title>

</head>

<body>
    
<!-- sidebar -->
<div class="side-menu side-menu-admin" id="mySidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <div class="smateo-logo">
        <img src="../images/smateo-shs.png" style="width: 70%;">
    </div>
    <ul>
        <a href="admin_dashboard.php"><li><img src="../images/dashboard (2).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Dashboard</h4></li></a>
        <a href="teacher_management.php"><li><img src="../images/teacher2.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Teacher Management</h4></li></a>
        <a href="course_management.php"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Subject Management</h4></li></a>
        <a href="student_management.php"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Student Management</h4></li></a>
        <a href="user_settings.php"><li><img src="../images/settings.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">User Settings</h4></li></a>
        <a href="../php/logout.php"><li><img src="../images/settings.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Log Out</h4></li></a>
    </ul>
</div>
<!-- sidebar -->
  
<!-- Main -->
<div id="main">
    <h2><button class="openbtn" onclick="openNav()">☰</button>&nbsp;&nbsp;Departments</h2>  
    <button class="openbtn1" onclick="openNav1()">☰</button>
    <!-- Contents -->
        <div class="dashb_content">
            <hr class="line">       
            

            <?php 
            
            
            /*students count*/
                $STEM=mysqli_query($conn,"SELECT * FROM student_tbl WHERE dept='STEM' AND status='ACTIVE'")or die(mysqli_error($conn));
                $stemcount=mysqli_num_rows($STEM);

                $ABM=mysqli_query($conn,"SELECT * FROM student_tbl WHERE dept='ABM' AND status='ACTIVE'")or die(mysqli_error($conn));
                $abmcount=mysqli_num_rows($ABM);

                $HUMSS=mysqli_query($conn,"SELECT * FROM student_tbl WHERE dept='HUMSS' AND status='ACTIVE'")or die(mysqli_error($conn));
                $humsscount=mysqli_num_rows($HUMSS);

                $TVL=mysqli_query($conn,"SELECT * FROM student_tbl WHERE dept='HUMSS' AND status='ACTIVE'")or die(mysqli_error($conn));
                $tvlcount=mysqli_num_rows($TVL);
            ?>

            <div class="boxes">
                <a class="card card-std" href="student_management.php">
                    <img src="../images/male-student.png" style="width: 50%;">
                    <h3><?php echo $stemcount; ?></h3>
                    STEM
                </a>

                <a class="card card-tch" href="student_management.php">
                    <img src="../images/male-student.png" style="width: 50%;">
                    <h3><?php echo $abmcount; ?></h3>
                    ABM
                </a>

                <a class="card card-prg" href="student_management.php">
                    <img src="../images/male-student.png" style="width: 50%;">
                    <h3><?php echo $humsscount; ?></h3>
                    HUMSS
                </a>
                
                <a class="card card-samp" href="course_management.php">
                    <img src="../images/male-student.png" style="width: 50%;">
                    <h3><?php echo $tvlcount; ?></h3>
                    TECHVOC
                </a>

            </div>
         

        </div>
    <!-- Contents -->
</div>
<!-- Main -->

  
<script src="../sidebar_nav.js"></script>

</body>
</html>