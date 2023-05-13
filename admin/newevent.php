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
    <?php include "admin_nav.php"; ?>
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
                    <h1> Create Announcement </h1>
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <label for="title">Announcement Title</label><br>
                        <input type="text" name="title" id="title" placeholder="Subject Title" style="padding: 5px 10px;"/><br><br>

                        <label for="desc">Description</label><br>
                        <textarea name="desc" id="desc" style="padding: 25px 70px; height: 150px; width:500px;"></textarea><br><br>

                        <label for="date">Date time</label><br>
                        <input type="date" name="date" id="date" style="padding: 5px 10px;"/>
                        <input type="time" name="time" id="date" style="padding: 5px 10px;"/><br><br>

                        <label for="target">Target</label><br>
                        <select name="target" style="font-family: Consolas; cursor: pointer; padding: 5px 30px; width: 10%;" required>
                            <option disabled selected >Select Target</option>
                            <option value="STEM">STEM</option>
                            <option value="ABM">ABM</option>
                            <option value="HUMSS">HUMSS</option>
                            <option value="GAS">GAS</option>
                            <option value="TVL">TVL</option>
                            <option value="">Teachers</option>
                        </select>
                        <br><br>

                        <input type="submit" class="btn_crt" name="create" value="Create">
                    </form>
                </div>
            </div>
            <?php 
                if(isset($_POST['create'])) {
                    $title = $_POST['title'];
                    $desc = $_POST['desc'];
                    $date = $_POST['date'].' '.$_POST['time'];
                    $target = $_POST['target'];
                    $sql = mysqli_query($conn, "INSERT INTO announcement_tbl (title, description, date, enabled, target) VALUES ('$title', '$desc', '$date', 1, '$target')");
                    
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