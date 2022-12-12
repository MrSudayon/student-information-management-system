<?php
    include "../php/dbase_config.php";
    $sql = "SELECT * FROM tbllinks";
    $result = mysqli_query($conn, $sql);
    
    $files = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
       
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
        <a href="modules.php"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Modules</h4></li></a>
        <a href="#"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">List of Sections</h4></li></a>
        <a href="links.php"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Links</h4></li></a>
        <a href="#"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Grades of Students</h4></li></a>
        <a href="../portal.html"><li><img src="../images/settings.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Log Out</h4></li></a>
    </ul>
</div>
<!-- sidebar -->
  
<!-- Main -->
<div id="main">
    <h2><button class="openbtn" onclick="openNav()">☰</button>&nbsp;&nbsp;Link Manager</h2>  
    <button class="openbtn1" onclick="openNav1()">☰</button>
    <!-- Contents -->
        <hr class="line">
        <div class="dashb_content">
		<form action="addlink.php" method="post" enctype="multipart/form-data">
            <center>
                <label class="weeklbl">Description:</label><input type="text" class="weektxt1" name="descript" required placeholder="name or description">
                <label class="weeklbl">Link:</label><input type="text" class="weektxt1" name="link" required placeholder="ex. paste link here">
                <input type="submit" class="btnup" name="addbut">
            </center>
        </div>
        <hr class="line">
                </div>
                    <div class="dashb_content2">
                        <table class="table table-hover">
                        <thead class="tbhead">
                            <th>Description</th>
                            <th>Link</th>
                        </thead>
                        <tbody>
                        <?php foreach ($files as $file): ?>
                            <tr class="trdata">
                            <td><?php echo $file['description']; ?></td>
                            <td><?php echo $file['links']; ?></td>
                        <?php endforeach;?>

                        </tbody>
                        </table>
                    </div>
        </form>

    <!-- Contents -->
</div>
<!-- Main -->

  

</body>
</html>



