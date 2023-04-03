<?php
    include "../php/dbase_config.php";
    require_once "../php/auth.php";
    $std_qry = mysqli_query($conn, "SELECT * FROM student_tbl WHERE id = $sess_id AND enabled = 1");
    
    if($std_qry->num_rows>0) {
        $strand_row = mysqli_fetch_array($std_qry);
        $section = $strand_row['section'];
        $strand = $strand_row['strand'];
        $grade = $strand_row['grade'];
    } else {
        ?>
            <script>
                alert ("Subject not existed");
            </script>
        <?php
    }

?>

<!DOCTYPE html>
<html lang="en">    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../images/smateo-shs.png">
    <title>Subjects</title>

<style type="text/css">

    .row {
        display: flex;
        flex-wrap: wrap;
    }
    .row::after {
        content: "";
        clear: both;
        display: table;
    }
    [class*="col-"] {
        float: left;
        padding: 20px;
    }
    [class*="col-"] {
        width: 100%;
    }
    @media only screen and (min-width: 486px) {
        /* For tablets: */
        .col-s-1 {width: 8.33%;}
        .col-s-2 {width: 16.66%;}
        .col-s-3 {width: 25%;}
        .col-s-4 {width: 33.33%;}
        .col-s-5 {width: 41.66%;}
        .col-s-6 {width: 50%;}
        .col-s-7 {width: 58.33%;}
        .col-s-8 {width: 66.66%;}
        .col-s-9 {width: 75%;}
        .col-s-10 {width: 83.33%;}
        .col-s-11 {width: 91.66%;}
        .col-s-12 {width: 100%;}
    }
    @media only screen and (min-width: 768px) {
        /* For desktop: */
        .col-1 {width: 8.33%;}
        .col-2 {width: 16.66%;}
        .col-3 {width: 25%;}
        .col-4 {width: 33.33%;}
        .col-5 {width: 41.66%;}
        .col-6 {width: 50%;}
        .col-7 {width: 58.33%;}
        .col-8 {width: 66.66%;}
        .col-9 {width: 75%;}
        .col-10 {width: 83.33%;}
        .col-11 {width: 91.66%;}
        .col-12 {width: 100%;}
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
    <?php include "./student_nav.php"; ?>
</div>
<!-- sidebar -->

<!-- Main -->
<div id="main">
    <h2><button class="openbtn" onclick="openNav()">☰</button>&nbsp;&nbsp;Subjects</h2>  
        <button class="openbtn1" onclick="openNav1()">☰</button>
    <!-- Contents -->
    <div class="dashb_content">
        <hr class="line">

        <!-- Subjects Contents -->
        <div class="row">

            <?php
            
            $sql = mysqli_query($conn,"SELECT * FROM subject_tbl WHERE archive=0 AND grade='$grade' AND (dept='$strand' OR dept='') ORDER BY dept DESC");
            while($row=mysqli_fetch_array($sql)) {
            ?>
                <div class="col-3 col-s-12">	
                <form method="GET">
                    <a href="../courses/course_view.php?name=<?php echo $sess_name; ?>&subj_id=<?php echo ($row['subj_id']); ?>&subj_code=<?php echo ($row['subj_code']); ?>&section=<?php echo $section; ?>">
                    <div class="subj-card"style="border-radius:25px;">
                        <div class="header" style="border-radius:25px 25px 0px 0px;" > 
                            <h1><?php echo strtoupper ($row['subj_code']); ?></h1>
                        <p><input type="hidden" value="<?php echo ($row['subj_id']); ?>" name="subj_id"></p>
                        
                        </div>
                        <div class="subj" style="border-radius: 0px 0px 25px 25px;">
                            <center>
                            <img src="../imgsubject/<?php echo ($row['subj_image']); ?>" style="height: 220px; padding: 0;">
                            </center>
                        </div>
                    </div> 
                    </a>
                </form>
                </div>
            <?php
            } 
            ?>
        
        </div>
        <!-- Subjects Contents -->



    </div>
    <!-- Contents -->
</div>
<!-- Menu -->


<script src="../sidebar_nav.js"></script>
</body>
</html>