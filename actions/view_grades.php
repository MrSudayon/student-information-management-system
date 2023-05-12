<?php
    include "../php/dbase_config.php";
    require_once "../php/auth.php";
        $id = $_GET['id'];
        $name = $_GET['name'];

        mysqli_query($conn, "INSERT INTO history_tbl (uName, uType, uAction, timedate) VALUES('$sess_name', '$sess_role', 'View Grades', NOW())")
        or die(mysqli_error($conn));

        $std_qry = mysqli_query($conn, "SELECT * FROM student_tbl WHERE id = $sess_id ");
        if($std_qry->num_rows>0) {
            $strand_row = mysqli_fetch_array($std_qry);
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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="../images/smateo-shs.png">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/admin.css">
        <title>San Mateo IMS</title>
</head>

<body>
    
<!-- sidebar -->
<div class="side-menu" id="mySidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <div class="smateo-logo">
        <img src="../images/smateo-shs.png" style="width: 70%;">
    </div>
    <!-- wag mo tanggalin wtf pang studednt navigator nito -->
    <nav>
    <ul >
        <a href="../student/account.php"><li><img src="../images/user-icon.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Account</h4></li></a>
        <a href="../student/dashboard.php"><li><img src="../images/dashboard (2).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Dashboard</h4></li></a>
        <a href="../student/subjects.php"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Subjects</h4></li></a> 
        <a href="../student/history.php"><li><img src="../images/settings.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">History</h4></li></a>
        <a href="#"><li><img src="../images/help-web-button.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Help</h4></li></a>
    </ul>
</nav>
</div>
<!-- sidebar -->
  
<!-- Main -->
<div id="main">
    <h2><button class="openbtn" onclick="openNav()">☰</button>&nbsp;&nbsp;<?php echo "Hello, ",$name; ?></h2>  
    <button class="openbtn1" onclick="openNav1()">☰</button>
    <!-- Contents -->
        <div class="dashb_content">
            <hr class="line">       
                <br>
                <!-- Student Grades -->
                <h3> Grade 11 </h3>
                <h3 style="font-size: 1em;"> 1st Semester Grades</h3>
                
                <table class="course_lists">
                    <tr>
                        <th style="width: 30%;">Subjects</th>
                        <th style="width: 15%;">1st Quarter</th>
                        <th style="width: 15%;">2nd Quarter</th>
                        <th style="width: 15%;">3rd Quarter</th>
                        <th style="width: 15%;">4th Quarter</th>
                        <th style="width: 15%;">Average</th>
                        <th style="width: 15%;">Remarks</th>
                    </tr>
                    <?php
                    //First Semester G11
                        $sql = mysqli_query($conn,"SELECT * FROM subject_tbl WHERE archive=0 AND grade='11' AND (dept='$strand' OR dept='')");

                        if($sql->num_rows>0) {
                            $result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
                        }
                    
                    foreach($result as $subject) {
                    ?>
                <tr>
                    <td><?php echo $subject['subj_name']; ?></td>
                    <td><input type="text" name="sem11" readonly style="border: 1px solid black; border-radius: 5px; padding: 5px; background-color: #e6ffdb; border-style: dotted; cursor: default; text-align: center;"/></td>
                    <td><input type="text" name="sem12" readonly style="border: 1px solid black; border-radius: 5px; padding: 5px; background-color: #e6ffdb; border-style: dotted; cursor: default; text-align: center;"/></td>
                    <td><input type="text" name="final1" readonly style="border: 1px solid black; border-radius: 5px; padding: 5px; background-color: #e6ffdb; border-style: dotted; cursor: default; text-align: center;"/></td>
                    <td><input type="text" name="Remarks" readonly style="border: 1px solid black; border-radius: 5px; padding: 5px; background-color: #e6ffdb; border-style: dotted; cursor: default; text-align: center;"/></td>
                </tr>
                    
                    <?php
                    }
                    ?>
                    
                </table>

                <br>
                <h3 style="font-size: 1em;"> 2nd Semester Grades</h3>
                
                <table class="course_lists">
                <tr>
                        <th style="width: 30%;">Subjects</th>
                        <th style="width: 15%;">1st Quarter</th>
                        <th style="width: 15%;">2nd Quarter</th>
                        <th style="width: 15%;">3rd Quarter</th>
                        <th style="width: 15%;">4th Quarter</th>
                        <th style="width: 15%;">Average</th>
                        <th style="width: 15%;">Remarks</th>
                </tr>
                
                    <?php
                    //2nd Semester
                    //about the "grade" value on the query below, nag add ako ng -2 para ma filter ko yung mga subjects na pang grade 11 2nd sem. iCorrect mo nalang siguro
                        $sql1 = mysqli_query($conn,"SELECT * FROM subject_tbl WHERE archive=0 AND grade LIKE '___2%' AND (dept='$strand' OR dept='')");
                       
                        if($sql1->num_rows>0) {
                            $result1 = mysqli_fetch_all($sql1, MYSQLI_ASSOC);
                        }
                      
                    foreach($result1 as $subject1) {
                    ?>
                <tr>
                    <td><?php echo $subject1['subj_name']; ?></td>
                    <td><input type="text" name="sem13" readonly style="border: 1px solid black; border-radius: 5px; padding: 5px; background-color: #e6ffdb; border-style: dotted; cursor: default; text-align: center;"/></td>
                    <td><input type="text" name="sem14" readonly style="border: 1px solid black; border-radius: 5px; padding: 5px; background-color: #e6ffdb; border-style: dotted; cursor: default; text-align: center;"/></td>
                    <td><input type="text" name="final3" readonly style="border: 1px solid black; border-radius: 5px; padding: 5px; background-color: #e6ffdb; border-style: dotted; cursor: default; text-align: center;"/></td>
                    <td><input type="text" name="Remarks2" readonly style="border: 1px solid black; border-radius: 5px; padding: 5px; background-color: #e6ffdb; border-style: dotted; cursor: default; text-align: center;"/></td>
                </tr>
                    
                    <?php
                    }
                    ?>
        
                </table>
                <br>
                
                <h3> Grade 12 </h3>
                <h3 style="font-size: 1em;"> 1st Semester Grades</h3>
                
                <table class="course_lists">
                    <tr>
                        <th style="width: 30%;">Subjects</th>
                        <th style="width: 15%;">1st Sem</th>
                        <th style="width: 15%;">2nd Sem</th>
                        <th style="width: 15%;">Final Grade</th>
                        <th style="width: 15%;">Remarks</th>
                    </tr>
                    <?php
                    //First Semester G11
                        $sql2 = mysqli_query($conn,"SELECT * FROM subject_tbl WHERE archive=0 AND grade='12' AND (dept='$strand' OR dept='')");

                        if($sql2->num_rows>0) {
                            $result2 = mysqli_fetch_all($sql2, MYSQLI_ASSOC);
                        }
                       
                    
                    foreach($result2 as $subject2) {
                    ?>
                <tr>
                    <td><?php echo $subject2['subj_name']; ?></td>
                    <td><input type="text" name="sem11" readonly style="border: 1px solid black; border-radius: 5px; padding: 5px; background-color: #e6ffdb; border-style: dotted; cursor: default; text-align: center;"/></td>
                    <td><input type="text" name="sem12" readonly style="border: 1px solid black; border-radius: 5px; padding: 5px; background-color: #e6ffdb; border-style: dotted; cursor: default; text-align: center;"/></td>
                    <td><input type="text" name="final1" readonly style="border: 1px solid black; border-radius: 5px; padding: 5px; background-color: #e6ffdb; border-style: dotted; cursor: default; text-align: center;"/></td>
                    <td><input type="text" name="Remarks" readonly style="border: 1px solid black; border-radius: 5px; padding: 5px; background-color: #e6ffdb; border-style: dotted; cursor: default; text-align: center;"/></td>
                </tr>
                    
                    <?php
                    }
                    ?>
            
                </table>
            </div>
        </div>
    <!-- Contents -->
</div>
<!-- Main -->
  





  
<script src="../sidebar_nav.js"></script>


</body>
</html>