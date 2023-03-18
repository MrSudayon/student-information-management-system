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
    <?php include "./student_nav.php"; ?>
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
                <table class="s-table" style="overflow: auto; height: 80dvh; width: 100%;">
                    <tr>
                        <th stlye="width: 30%;">Name</th>
                        <th style="width: 50%;">  Action  </th>
                        <th style="width: 20%;">Date and Time</th>
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