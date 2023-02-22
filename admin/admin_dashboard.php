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
    <ul>
        <a href="admin_dashboard.php"><li><img src="../images/dashboard (2).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Dashboard</h4></li></a>
        <a href="teacher_management.php"><li><img src="../images/teacher2.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Teacher Management</h4></li></a>
        <a href="course_management.php"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Subject Management</h4></li></a>
        <a href="student_management.php"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Student Management</h4></li></a>
        <a href="eventlists.php"><li><img src="../images/settings.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Announcement Lists</h4></li></a>
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
            

            <?php 
            
            
            /*student count*/
                $student=mysqli_query($conn,"SELECT * FROM student_tbl WHERE enabled=1")or die(mysqli_error($conn));
                $stdcount=mysqli_num_rows($student);

            /*teacher count*/
                $teacher=mysqli_query($conn,"SELECT * FROM teachers_tbl WHERE tchr_STATUS='ACTIVE'")or die(mysqli_error($conn));
                $tchcount=mysqli_num_rows($teacher);

            /*sample count*/
                $subj=mysqli_query($conn,"SELECT * FROM subject_tbl WHERE archive=0")or die(mysqli_error($conn));
                $samplecount=mysqli_num_rows($subj);
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
                    <h3><?php echo "4"; ?></h3>
                    DEPARTMENTS
                </a>
                
                <a class="card card-samp" href="course_management.php">
                    <img src="../images/folder.png" style="width: 50%;">
                    <h3><?php echo $samplecount; ?></h3>
                    SUBJECTS
                </a>

                <a class="card card-samp" href="eventlists.php">
                    <img src="../images/notifications.png" style="width: 50%;">
                    <h3><?php echo 0; ?></h3>
                    ANNOUNCEMENT
                </a>
            </div>
        
           
            
           

        </div>
    <!-- Contents -->

    <style>
        .news_posting {
            display: flex;
            flex-direction: column;
            width: 100%;
            justify-content: center;
            text-align: center;
            align-content: center;
        }
        .announcement {
            width: 100%;
        }
        .announcemet input["text"] {
            width: 500px;
        }
        #desc {
            width: 300px;
            height: 6dvh;
        }
        .create {
            background-color: yellow;
            padding: 5px 15px;
            margin-top: 5px;
            border: 1px solid black;
            border-radius: 5px;
            cursor: pointer;
            transition: ease-in-out .3s;
        }
        .create:hover{
            background-color: white;
            color: red;
        }
    </style>

</div>
<!-- Main -->

  
<script src="../sidebar_nav.js"></script>

</body>
</html>