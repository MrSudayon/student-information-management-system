<?php
    include "../php/dbase_config.php";
    include "../php/auth.php";
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../images/smateo-shs.png">
        <link rel="stylesheet" href="../css/style.css">
        <title>History</title>
    </head>

<body>
<!-- sidebar -->
<div class="side-menu" id="mySidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <div class="smateo-logo">
        <img src="../images/smateo-shs.png" style="width: 70%;">
    </div>
    <ul>
        <a href="account.php"><li><img src="../images/user-icon.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Account</h4></li></a>
        <a href="dashboard.php"><li><img src="../images/dashboard (2).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Dashboard</h4></li></a>
        <a href="subjects.php"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Subjects</h4></li></a> 
        <a href="history.php"><li><img src="../images/settings.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">History</h4></li></a>
        <a href="#"><li><img src="../images/help-web-button.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Help</h4></li></a>
        <a href="../php/logout.php"><li><img src="../images/settings.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Log Out</h4></li></a>
    </ul>
</div>
<!-- sidebar -->


<!-- Main -->
<div id="main">
    <h2><button class="openbtn" onclick="openNav()">☰</button>&nbsp;&nbsp;History</h2>  
    <button class="openbtn1" onclick="openNav1()">☰</button>
    <!-- Contents -->
        <div class="dashb_content">
            <hr class="line">       
            <div class="news">
            <?php
                $sql="SELECT * FROM history_tbl WHERE uName='$sess_name'";

                $res = $conn->query($sql);
                if ($res->num_rows > 0) { ?>
                
                <br>
                <table class="s-table">
                    <tr>
                        <th>Name</th>
                        <th>Action</th>
                        <th>Date and Time</th>
                    </tr>
            <?php while($row = $res->fetch_assoc()) {  ?>
                    <tr>
                        <td><?php echo $row['uName']; ?></td>
                        <td><?php echo $row['uAction']; ?></td>
                        <td><?php echo $row['timedate']; ?></td>
            <?php } ?>
                    </tr>
                </table>
                <?php
                } else {
                    echo "<CENTER><p style='color:red' font-size='3em'> 0 results </p></CENTER>";
                }
                $conn->close();
                ?>
            </div>
        </div>
    <!-- Contents -->
</div>
<!-- Main -->
<script src="../sidebar_nav.js"></script>
</body>
</html>