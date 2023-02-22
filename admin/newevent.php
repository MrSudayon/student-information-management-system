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
    <h2><button class="openbtn" onclick="openNav()">☰</button>&nbsp;&nbsp;Announcement Lists</h2>  
    <button class="openbtn1" onclick="openNav1()">☰</button>
    <!-- Contents -->
        <div class="dashb_content"> 
            <hr class="line">       
            <br>
            <center>

            <div class="news_posting">
                <div class="announcement">
                    <h1> Create Announcement </h1><br>
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <label for="title">Announcement Title</label><br>
                        <input type="text" name="title" id="title" placeholder="Subject Title"/><br>
                        <label for="desc">Description</label><br>
                        <textarea name="desc" id="desc"></textarea><br>
                        <label for="date">Date time</label><br>
                        <input type="date" name="date" id="date"/>
                        <input type="time" name="time" id="date"/><br>
                        <input type="submit" class="btn_crt" name="create" value="Create">
                    </form>
                </div>
            </div>
            <?php 
                if(isset($_POST['create'])) {
                    $title = $_POST['title'];
                    $desc = $_POST['desc'];
                    $date = $_POST['date'].' '.$_POST['time'];

                    $sql = mysqli_query($conn, "INSERT INTO announcement_tbl (title, description, date, archive) VALUES ('$title', '$desc', '$date', 1)");
                    
                    ?>
                        <script>
                            alert('Announcement/Event Successfully added!');
                            window.location.href = "../admin/eventlists.php";
                        </script>
                    <?php

                    $conn -> close();

                }
            ?>
            </center>
        </div>
    <!-- Contents -->
</div>
<!-- Main -->
  
           
  
<script src="../sidebar_nav.js"></script>

</body>
</html>