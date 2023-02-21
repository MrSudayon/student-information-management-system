<?php 
    include "../php/dbase_config.php";
    /*require_once "../php/auth.php";
    */

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
        <title>Instructor Management</title>
</head>

<body>
    
<!-- sidebar -->
<div class="side-menu" id="mySidebar">
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
        <!--<a href="user_settings.php"><li><img src="../images/settings.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">User Settings</h4></li></a>-->
        <a href="../php/logout.php"><li><img src="../images/settings.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Log Out</h4></li></a>
    </ul>
</div>
<!-- sidebar -->
  
<!-- Main -->
<div id="main">
    <h2><button class="openbtn" onclick="openNav()">☰</button>&nbsp;&nbsp;Instructor Management</h2>  
    <button class="openbtn1" onclick="openNav1()">☰</button>
    <!-- Contents -->
        <div class="dashb_content">
            <hr class="line">       

                <br>
                <center>
                <a name="create" class="btn_crt" href="../actions/tchr_create.php">Create User</a>
                <h3>Teachers Lists</h3>
                    <table class=course_lists >
                        <tbody>
                        <tr bgcolor=#363636 style='color:white'>
                            <th>Instructor Name</th>
                            <th>Strand/Department</th>
                            <th>Advising Section</th>
                            <th>User</th>
                            <th>Phone #</th>
                            <th>Subjects</th>
                            <th>Action</th>
                        </tr>

                        <?php 
                            $sql = mysqli_query($conn, "SELECT * FROM teachers_tbl ORDER BY tchr_STATUS ASC, id ASC");
                            foreach($sql as $row) :
                            
                                $status = $row['tchr_STATUS'];
                                if($status=='INACTIVE') {
                                    ?>
                                        <tr bgcolor='red'>
                                    <?php
                                }else {
                                    ?>
                                        <tr bgcolor=white>
                                    <?php
                                }
                        ?>
                            <?php echo "<td>" .$row['tchr_LAST'],', ' .$row['tchr_FIRST'],' ' .$row['tchr_MID']; ?>
                            <td><?php echo $row['department']; ?></td>
                            <td><?php echo $row['section']; ?></td>
                            <td><?php echo $row['user']; ?></td>
                            <td><?php echo $row['tchr_PHONE']; ?></td>
                            <td><?php echo $row['subjects']; ?></td>
                            <td><a href="../actions/tchr_update.php?id=<?php echo ($row['id']); ?>" class="update_btn">UPDATE</a></td>
                        </tr>
                        <?php
                            endforeach 
                        ?>
                    </table>
                </center>
        </div>
    <!-- Contents -->
</div>
<!-- Main -->
  





  
<script src="../sidebar_nav.js"></script>

</body>
</html>