<?php
    include '../php/dbase_config.php';
    require_once "../php/auth.php";

    $sqll = mysqli_query($conn, "SELECT * FROM announcement_tbl WHERE enabled = 1");
    while($sec=mysqli_fetch_array($sqll)) {  
        $sect = $sec['target'];
    }
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
<style>
.field {
    min-width: 100%;
    height: 12dvh;
    display: flex;
    border: .5px solid black;
    border-radius: 10px;
    align-items: center;
    cursor: default;
}
.datetime {
    color: black;
}
.chck {
    padding: 10px 25px;
}
</style>
</head>

<body>
    
<!-- sidebar -->
<div class="side-menu" id="mySidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <div class="smateo-logo">
        <img src="../images/smateo-shs.png" style="width: 70%;">
    </div>
    <?php include "./teacher_nav.php"; ?>
</div>
<!-- sidebar -->
  
<!-- Main -->
<?php
    $sql1 = mysqli_query($conn, "SELECT tchr_FIRST FROM teachers_tbl WHERE id=$sess_id ");
    $res = mysqli_fetch_array($sql1); 
?>
<div id="main">
    <h2><button class="openbtn" onclick="openNav()">☰</button>&nbsp;&nbsp; Hello Teacher, <?php echo ucfirst($res['tchr_FIRST']); ?> </h2>  
    <button class="openbtn1" onclick="openNav1()">☰</button>
    <!-- Contents -->
        <div class="dashb_content">
            <hr class="line">
            
            <div class="news">
                <h3><img src="../images/announcement.png" style="width: 22px;"> Announcement</h3>
                <br>
                <div class="announcements">
                <?php
                
                    $sql = mysqli_query($conn, "SELECT * FROM announcement_tbl WHERE enabled = 1 AND target='' ORDER BY date asc") or die ("No events listed!");
                
                    while($row=mysqli_fetch_array($sql)) {  
                        
                        $date = $row['date']; // Numeric date in YYYY-MM-DD format
                        $date_to_letters = date("M j, Y", strtotime($date)); // Converts numeric date to shorter letter format

                         
                ?>
                    <div class="field">
                        <div class="chck">
                            <input type="checkbox" name="chck" class="chck" />
                        </div>
                        <div class="eventinfo">
                            <h4 class="title"><?php echo $row['title']; ?></h4>
                            <p class="desc"><?php echo $row['description']; ?></p>
                            <p class="datetime"><?php echo $date_to_letters; ?></p>
                        </div>
                    </div>
                    <br>
                <?php
                    }
                ?>
                </div>
            </div>
            
        </div>
    <!-- Contents -->
</div>
<!-- Main -->

  

</body>
</html>