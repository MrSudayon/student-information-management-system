<?php
    require_once "../php/auth.php";
    include "../php/dbase_config.php";
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/teacher.css">
        <link rel="icon" href="../images/smateo-shs.png">
        <title>Instructor Dash</title>
        <script src="../sidebar_nav.js"></script>
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
        <a href="tchr_subjects.php"><li><img src="../images/teacher2.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Subjects</h4></li></a>
        <a href="modules.php"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Modules</h4></li></a>
        <a href="links.php"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Links</h4></li></a>
        <a href="#"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">List of Sections</h4></li></a>
        <a href="#"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Students Grades</h4></li></a>
        <a href="../portal.html"><li><img src="../images/settings.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Log Out</h4></li></a>
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
                                                                                            /** Fetch teacher ID */
            $sql = mysqli_query($conn,"SELECT * FROM subject_tbl WHERE archive=0 AND assignedto='instructor 2'");
        
            while($row=mysqli_fetch_array($sql)) {
            ?>
                <a href="../courses/#?subj_id=<?php echo ($row['subj_id']); ?>&subj_code=<?php echo ($row['subj_code']); ?>">
                    <div class="subj-card"style="border-radius:25px">
                        <div class="header" style="border-radius:25px 25px 0px 0px" > 
                            <h1>G11 - 2 FILP 11</h1>
                        <p><input type="hidden" value="<?php echo ($row['subj_id']); ?>" name="subj_id"></p>
                        </div>
                        <div class="subj" style="border-radius: 0px 0px 25px 25px">
                            <center>
                            <img src="../images/subj_imgs/<?php echo ($row['subj_image']); ?>">
                            </center>
                        </div>
                    </div> 
                </a>
            <?php
            }
            ?>
            <a href="../courses/#?subj_id=<?php echo ($row['subj_id']); ?>&subj_code=<?php echo ($row['subj_code']); ?>">
                    <div class="subj-card"style="border-radius:25px">
                        <div class="header" style="border-radius:25px 25px 0px 0px" > 
                            <h1>Section 2</h1>
                        <p><input type="hidden" value="<?php echo ($row['subj_id']); ?>" name="subj_id"></p>
                        </div>
                        <div class="subj" style="border-radius: 0px 0px 25px 25px">
                            <center>
                            <img src="../images/subj_imgs/<?php echo ($row['subj_image']); ?>">
                            </center>
                        </div>
                    </div> 
                </a>
        </div>
    <!-- Contents -->
</div>
<!-- Main -->

  

</body>
</html>