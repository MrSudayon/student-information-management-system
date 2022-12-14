<?php
    include "../php/dbase_config.php";
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
        <title>Dashboard</title>

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
        <a href="course_management.php"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Course Management</h4></li></a>
        <a href="student_management.php"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Student Management</h4></li></a>
        <a href="user_settings.php"><li><img src="../images/settings.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">User Settings</h4></li></a>
        <a href="../index.html"><li><img src="../images/settings.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Log Out</h4></li></a>
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
            

            <?php 
            
            
            /*student count*/
                $student=mysqli_query($conn,"SELECT * FROM user WHERE UTYPE=3")or die(mysqli_error($conn));
                $stdcount=mysqli_num_rows($student);

            /*teacher count*/
                $teacher=mysqli_query($conn,"SELECT * FROM user WHERE UTYPE=2")or die(mysqli_error($conn));
                $tchcount=mysqli_num_rows($teacher);

            /*sample count*/
                $subj=mysqli_query($conn,"SELECT * FROM subject_tbl WHERE archive=0")or die(mysqli_error($conn));
                $samplecount=mysqli_num_rows($subj);
            ?>

            <div class="boxes">
                <a class="card card-std" href="student_management.php">
                    <img src="../images/male-student.png" style="width: 50%;">
                    <h3><?php echo $stdcount; ?></h3>
                    STUDENT ENROLLED
                </a>

                <a class="card card-tch" href="teacher_management.php">
                    <img src="../images/dean.png" style="width: 50%;">
                    <h3><?php echo $tchcount; ?></h3>
                    INSTRUCTORS
                </a>

                <a class="card card-prg" href="#">
                    <img src="../images/online-course.png" style="width: 50%;">
                    <h3><?php echo $tchcount; ?></h3>
                    PROGRAMS?
                </a>
                
                <a class="card card-samp" href="course_management.php">
                    <img src="../images/folder.png" style="width: 50%;">
                    <h3><?php echo $samplecount; ?></h3>
                    SAMPLE
                </a>
            </div>
         

        </div>
    <!-- Contents -->
</div>
<!-- Main -->

  
<script src="../sidebar_nav.js"></script>

</body>
</html>