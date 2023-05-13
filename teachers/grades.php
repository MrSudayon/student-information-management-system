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
      <title>Grade</title>
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
         <h2><button class="openbtn" onclick="openNav()">☰</button>&nbsp;&nbsp;Student Grades </h2>
         <button class="openbtn1" onclick="openNav1()">☰</button>
         <!-- Contents -->
         <div class="dashb_content">
         <a href="../teachers/all_grades.php" style="float:right;">View All grades</a>
         <br>
            <hr class="line">
            <center>
               <form method="POST" action="grades.php">
                <h3>Generate Grade Form for</h3>

                <?php  
                    $query1 ="SELECT DISTINCT section FROM student_tbl";
                    $result1 = $conn->query($query1);
                    if($result1->num_rows> 0){
                        $options= mysqli_fetch_all($result1, MYSQLI_ASSOC);
                    }
                    ?>
                <select id="section" name="section" style="font-family: Consolas; cursor: pointer; padding: 5px 30px;width: 10%;" required>
                    <option value="" disabled selected >Select Section</option>
                    <?php 
                    foreach ($options as $option) {
                    ?>
                    <option value="<?php echo $option['section']; ?>"><?php echo $option['section']; ?> </option>
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
                <select id="subject" name="subject" style="font-family: Consolas; cursor: pointer; padding: 5px 30px;width: 10%;" required>
                    <option value="" disabled selected>Select Subject</option>
                    <?php 
                    foreach ($s as $subject) {
                    ?>
                    <option value="<?php echo $subject['subj_code'];?>"><?php echo $subject['subj_code']; ?> </option>
                    <?php 
                    }
                    ?>
                </select>
            
                <select id="quarter" name="quarter" style="font-family: Consolas; cursor: pointer; padding: 5px 30px; width: 10%;" required>
                    <option value="" disabled selected>Select Quarter</option>
                    <option value="1st Quarter" >1st Quarter</option>
                    <option value="2nd Quarter" >2nd Quarter</option>
                    <option value="3rd Quarter" >3rd Quarter</option>
                    <option value="4th Quarter" >4th Quarter</option>
                </select>
                <br><br>
                <button type='submit' name='btnFilter' style="cursor: pointer; padding: 5px 50px;">Filter</button>

            </form>
            <form method="POST" action="grades.php">
                <br>
                
                    
                    <?php
                        if(isset($_POST['btnFilter'])){
                            $subj = $_POST['subject'];
                            $selected_sec = $_POST['section'];
                            $selected_sub = $_POST['subject'];
                            $qrtr = $_POST['quarter'];

                            //Selected Section
                            $sql = "SELECT * FROM student_tbl WHERE section='$selected_sec' order by name AND enabled='1'";
                            $result = mysqli_query($conn, $sql);
                            //Selected Subject
                            $sql1 = "SELECT * FROM subject_tbl WHERE subj_code='$selected_sub' AND instructor='$sess_name' order by name AND archive='0'";
                            $result1 = mysqli_query($conn, $sql1);
                        
                        }
                    ?>
                <table class="tableFixHead">
                    <tr>
                    <?php
                        if($subj==null) {
                    ?>
                        <th colspan=4 style="display: none;"> <label><?php echo $subj; ?></label> </th>
                        <tr style="display: none;">
                    <?php
                        } else {
                    ?>
                    <th colspan=4"> <label><?php echo $subj; ?></label> </th>
                    </tr>
                    <tr>
                        <th>No.</th>
                        <th>LRN</th>
                        <th>Student Name</th>
                        <th><label><?php echo $qrtr; ?> </label> Grade </th>
                    </tr>
                    
                    <?php
                        
                    
                        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        $i = 1;
                        foreach ($rows as $row): ?>
                        <input type="hidden" name='sel_section[]' value='<?php echo $selected_sec; ?>'/>
                        <input type="hidden" name='subject[]' value='<?php echo $_POST['subject']; ?>'/>
                        <input type="hidden" name='qrtr[]' value='<?php echo $qrtr; ?> ' />

                    <tr bgcolor="white">
                        <td><?php echo $i;  ?></td>
                        <td><input readonly name="LRN[]" value='<?php echo $row['LRN']; ?>' style="text-align: center; border: none;"></td>
                        <td><input readonly name="name[]" value='<?php echo $row['name']; ?>' style="text-align: center; border: none;"></td>
                        <td><input name="grade[]"> </td>

                        <!-- <td><input type="text" id="sem1" name="sem1"></td>
                        <td><input type="text" id="sem2" name="sem2"></td>
                        <td><input type="text" id="remarks" name="remarks"></td> -->
                    </tr>
                    <?php $i++; 
                        endforeach;?>
                </table>
                <br>
                <input type="submit" name="encode" value="Encode" class="tBtns"/>
                <?php
                        }
                ?>
            </center>
            </form>
         </div>
         <!-- Contents -->
      </div>
      <!-- Main -->
   </body>
</html>

<?php
if(isset($_POST['encode'])){
    $lrn = $_POST['LRN'];
    $name = $_POST['name'];
    $grade = $_POST['grade'];
    $qrtr = $_POST['qrtr'];
    $subjc = $_POST['subject'];
    $selected_sec = $_POST['sel_section'];
    $query_success = true;
    
    foreach($lrn as $key=>$value){
        $lrn_val = mysqli_real_escape_string($conn, $value);
        $name_val = mysqli_real_escape_string($conn, $name[$key]);
        $grade_val = mysqli_real_escape_string($conn, $grade[$key]);
        $subjc_val = mysqli_real_escape_string($conn, $subjc[$key]);
        $qrtr_val = mysqli_real_escape_string($conn, $qrtr[$key]);
        $selected_sec_val = mysqli_real_escape_string($conn, $selected_sec [$key]);

        $sql = "INSERT INTO grade_tbl (LRN,NAME,SUBJECT_CODE,GRADE,QUARTER,SECTION) VALUES ('$lrn_val','$name_val','$subjc_val', '$grade_val', '$qrtr_val','$selected_sec_val')";
        
        if(mysqli_query($conn, $sql)){
            $query_success = true;
        } else {
            $query_success = false;
            break;
        }
    }
    
    if($query_success){
        ?><center><?php echo "All grades have been successfully saved."; ?></center><?php
    } else {
       ?><center><?php echo "There was an error saving the grades. Please try again.";?></center><?php
    }
}

?>
