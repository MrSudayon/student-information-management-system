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
        <title>Announcement Management</title>

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
        <a href="course_management.php"><li><img src="../images/subject.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Subject Management</h4></li></a>
        <a href="student_management.php"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Student Management</h4></li></a>
        <a href="eventlists.php"><li><img src="../images/announcement1.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Announcement Lists</h4></li></a>
        <a href="../php/logout.php"><li><img src="../images/logout.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Log Out</h4></li></a>
    </ul>
</div>
<!-- sidebar -->
  
<!-- Main -->
<div id="main">
    <h2><button class="openbtn" onclick="openNav()">☰</button>&nbsp;&nbsp;Announcement Management</h2>  
    <button class="openbtn1" onclick="openNav1()">☰</button>
    <!-- Contents -->
        <div class="dashb_content"> 
            <hr class="line">       
            <br>
            <!-- CRUD -->
           
            <center>
            <a name="create" class="btn_crt" href="newevent.php">Create Announcement</a>
            <h3>Announcement Lists</h3>
            <table class=course_lists>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Date & Time</th>
                    <th>Remove</th>
                </tr>

                <?php
                    
                    $sql = mysqli_query($conn, "SELECT * FROM announcement_tbl ORDER BY enabled DESC, date ASC");
                    while($row=mysqli_fetch_array($sql)) {
                        $en = $row['enabled'];
                        if($en == 0) {
                            ?>
                                <tr bgcolor='#ffcccb'>
                            <?php
                        }else {
                            ?>
                                <tr bgcolor=white>
                            <?php
                        }
                ?>

                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['description']; ?> </td>
                    <td><?php echo $row['date']; ?></td>
                    <td><a href="eventremove.php?id=<?php echo $row['id']; ?>" name="rem" class="btn_can" style="padding:2px 10px; color: black;">Remove</a></td>
                </tr>
                <?php
                    }
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