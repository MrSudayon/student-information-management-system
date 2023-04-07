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
        <title>Dashboard</title>

</head>

<body>
    
<!-- sidebar -->
<div class="side-menu side-menu-admin" id="mySidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <div class="smateo-logo">
        <img src="../images/smateo-shs.png" style="width: 70%;">
    </div>
    <?php include "./admin_nav.php"; ?>
</div>
<!-- sidebar -->
  
<!-- Main -->
<div id="main">
    <h2><button class="openbtn" onclick="openNav()">☰</button>&nbsp;&nbsp;Dashboard</h2>  
    <button class="openbtn1" onclick="openNav1()">☰</button>
    <!-- Contents -->
        <div class="dashb_content">
            <hr class="line">
            <h1> Hello, <?php echo ucfirst($sess_name); ?></h1>       
            

            <?php 
            
            
            /*student count*/
                $student=mysqli_query($conn,"SELECT * FROM student_tbl WHERE enabled=1")or die(mysqli_error($conn));
                $stdcount=mysqli_num_rows($student);

            /*teacher count*/
                $teacher=mysqli_query($conn,"SELECT * FROM teachers_tbl WHERE tchr_STATUS='ACTIVE'")or die(mysqli_error($conn));
                $tchcount=mysqli_num_rows($teacher);

            /*subject count*/
                $subj=mysqli_query($conn,"SELECT * FROM subject_tbl WHERE archive=0")or die(mysqli_error($conn));
                $subjcount=mysqli_num_rows($subj);

            /*announcement count*/
                $announcement=mysqli_query($conn, "SELECT * FROM announcement_tbl WHERE enabled=1")or die(mysqli_error($conn));
                $activeannouncementcount=mysqli_num_rows($announcement);

            /*departments count*/
                $dept=mysqli_query($conn,"SELECT DISTINCT department FROM department_tbl");
                $deptcount=mysqli_num_rows($dept);
            
            
            ?>

            <div class="boxes">
                <a class="card card-std" href="student_management.php">
                    <img src="../images/male-student.png" style="width: 50%;">
                    <h3><?php echo $stdcount; ?></h3>
                    STUDENTS
                </a>

                <a class="card card-tch" href="teacher_management.php">
                    <img src="../images/dean.png" style="width: 50%;">
                    <h3><?php echo $tchcount; ?></h3>
                    INSTRUCTORS
                </a>

                <a class="card card-prg" href="departments.php">
                    <img src="../images/online-course.png" style="width: 50%;">
                    <h3><?php echo $deptcount; ?></h3>
                    DEPARTMENTS
                </a>
                
                <a class="card card-samp" href="course_management.php">
                    <img src="../images/folder.png" style="width: 50%;">
                    <h3><?php echo $subjcount; ?></h3>
                    SUBJECTS
                </a>

                <a class="card card-samp" href="eventlists.php">
                    <img src="../images/notifications.png" style="width: 50%;">
                    <h3><?php echo $activeannouncementcount; ?></h3>
                    ANNOUNCEMENT
                </a>
            </div>

        </div>
    <!-- Contents -->
   
</div>
<!-- Main -->

  
<script src="../sidebar_nav.js"></script>

</body>
</html>