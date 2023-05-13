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
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/teacher.css">
    <link rel="icon" href="../images/smateo-shs.png">
    <title>Grades</title>
    <script src="../sidebar_nav.js"></script>
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
    <div id="main">
        <h2><button class="openbtn" onclick="openNav()">☰</button>&nbsp;&nbsp;Encoded Grades </h2>
        <button class="openbtn1" onclick="openNav1()">☰</button>
        <!-- Contents -->
        <div class="dashb_content">
        <br>
        <hr class="line">
        <center>
        <form method="POST" action="all_grades.php">
            <h3>Students Grades</h3>
    
                <?php  
                    $query1 ="SELECT DISTINCT SECTION FROM grade_tbl";
                    $result1 = $conn->query($query1);
                    if($result1->num_rows> 0){
                        $options= mysqli_fetch_all($result1, MYSQLI_ASSOC);
                    }
                
                    ?>
                <select id="section" name="section_name" style="font-family: Consolas; padding: 5px 10px; width: 15%;" required>
                    <option value="" disabled selected >Select Section</option>
                    <?php 
                    foreach ($options as $option) {
                    ?>
                    <option value="<?php echo $option['SECTION']; ?>"><?php echo $option['SECTION']; ?> </option>
                    <?php 
                    }
                    ?>
                </select>
            
                <?php  
                    $sss = mysqli_query($conn,"SELECT tchr_LAST FROM teachers_tbl WHERE id='$sess_id' AND tchr_STATUS='ACTIVE'")->fetch_object()->tchr_LAST;
                    $query2 = "SELECT * FROM subject_tbl WHERE Instructor LIKE '%".$sss."%' AND archive='0'"; 
                    $result2 = $conn->query($query2);
                
                    if($result2->num_rows> 0){
                        $s = mysqli_fetch_all($result2, MYSQLI_ASSOC);
                        //$subs = explode(', ',$s['subjects']);
                    }
                ?>
                <select id="subject" name="subject" style="font-family: Consolas; cursor: pointer; padding: 5px 10px; width: 15%;" required>
                    <option disabled selected>Select Subject</option>
                    <?php 
                    foreach ($s as $subject) {
                    ?>
                    <option value="<?php echo $subject['subj_code']; ?>"><?php echo $subject['subj_code']; ?> </option>
                    <?php 
                    }
                    
                    ?>
                </select>
                <br><br>
                <button type='submit' name='btnFilter' style="cursor: pointer; padding: 5px 50px;">Filter</button>

        </form>
        <form>
<?php
if(isset($_POST['btnFilter'])){
    $subj=$_POST['subject'];
    $section_name=$_POST['section_name'];
    $qrtr=$_POST['quarter'];
    $sql = "SELECT LRN, NAME, 
        MAX(CASE WHEN QUARTER = '1st Quarter' THEN GRADE END) AS 'Q1',
        MAX(CASE WHEN QUARTER = '2nd Quarter' THEN GRADE END) AS 'Q2',
        MAX(CASE WHEN QUARTER = '3rd Quarter' THEN GRADE END) AS 'Q3',
        MAX(CASE WHEN QUARTER = '4th Quarter' THEN GRADE END) AS 'Q4'
        FROM grade_tbl WHERE SUBJECT_CODE = '$subj' AND SECTION='$section_name'
        GROUP BY NAME";
    $RESULT = $conn->query($sql);
    if($RESULT->num_rows> 0){
        $RES= mysqli_fetch_all($RESULT, MYSQLI_ASSOC);
    }else{
        echo "<br><br><label style='color:red'>Not yet Encoded</label>";
    }        
}
?>
    <table>
        <tr>
        <?php
            if($subj == null) {
        ?>
            <th colspan=9 style="display: none;"><?php echo $subj; ?></th>
           
            <tr style="display: none;">
        <?php
            } else {
        ?>
            <th colspan=9><?php echo $subj; ?></th>
             </tr>
            <tr>
                <th>No.</th>
                <th>LRN</th>
                <th>Student Name</th>
                <th>1st Quarter</th>
                <th>2nd Quarter</th>
                <th>3rd Quarter</th>
                <th>4th Quarter</th>
                <th>Remarks</th>
                <th>Action</th>
            </tr>
        <?php
        }
       
            $i = 1;
            foreach ($RES as $row):
            
        ?>
        <tr>
            <td><?php echo $i;  ?></td>
            <td><?php echo $row['LRN']?></td>
            <td><?php echo $row['NAME']?></td>

            <?php
                echo "<td>" . $row["Q1"] . "</td>
                <td>" . $row["Q2"] . "</td>
                <td>" . $row["Q3"] . "</td>
                <td>" . $row["Q4"] . "</td>";
            ?>
            <?php

            if($row['Q1'] + $row['Q2']+ $row['Q3']+ $row['Q4'] >= 76 ) {
                echo '<td>'; echo "PASSED"; echo '</td>';
            } else {
                echo '<td>'; echo "FAILED"; echo '</td>';
            }
                
            ?>
            
            <td><button type='submit' name='btnEdit' style="cursor: pointer; padding: 5px 20px;">Edit</button></td>
        </tr>
    
        <?php 
            $i++; 
            endforeach;?>
    </table>
                
    </center>
    </form>
    </div>
        <!-- Contents -->
    </div>
    <!-- Main -->
</body>
</html>