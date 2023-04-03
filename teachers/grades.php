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
            <hr class="line">
            <center>
              
               <form method="POST" action="grades.php">
                   <h3>Generate Grade Form for</h3>
                  <table>
                     <tbody>
                        <tr>
                           <th>
                              <?php  
                                 $query1 ="SELECT DISTINCT section FROM student_tbl";
                                 $result1 = $conn->query($query1);
                                 if($result1->num_rows> 0){
                                     $options= mysqli_fetch_all($result1, MYSQLI_ASSOC);
                                 }
                                 ?>
                              <select id="section" name="section" style="font-family: Consolas; height: 30px; width: 100%;" required="required">
                                 <option value="" disabled selected >Select Section</option>
                                 <?php 
                                    foreach ($options as $option) {
                                    ?>
                                 <option><?php echo $option['section']; ?> </option>
                                 <?php 
                                    }
                                    ?>
                              </select>
                           </th>
                           <th>
                                <?php  
                                    $query2 ="SELECT subjects FROM teachers_tbl WHERE id='$sess_id' AND tchr_STATUS='ACTIVE'";
                                    $result2 = $conn->query($query2);
                                
                                    if($result2->num_rows> 0){
                                        $s = mysqli_fetch_all($result2, MYSQLI_ASSOC);
                                        //$subs = explode(', ',$s['subjects']);
                                    }
                                ?>
                              <select id="subject" name="subject" style="font-family: Consolas; height: 30px; width: 100%;" required="required">
                                 <option value="" disabled selected>Select Subject</option>
                                 <?php 
                                    foreach ($s as $subject) {
                                    ?>
                                 <option><?php echo $subject['subjects']; ?> </option>
                                 <?php 
                                    }
                                 
                                    ?>
                              </select>
                           <th>
                              <button type='submit' name='btnFilter' style="cursor: pointer;">Filter</button>
                           </th>
                        </tr>
                     </tbody>
                  </table>
                  <br>
                  <hr class="line">
                  <br>
                  <table class="tableFixHead">
                     
                        <tr style="display:none;">
                           <th> <label name='subject' value='<?php echo $_POST['subject']; ?>' ><?php echo  $_POST['subject']; ?></label> </th>
                        </tr>
                        <tr>
                           <th>No.</th>
                           <th>LRN</th>
                           <th>Student Name</th>
                           <th>1st Sem Final</th>
                           <th>2nd Sem Final</th>
                           <th>Remarks</th>
                        </tr>
                     
                        <?php
                           if(isset($_POST['btnFilter'])){
                               $selected_sec = $_POST['section'];
                               $selected_sub = $_POST['subject'];
                               $sql = "SELECT * FROM student_tbl where section='$selected_sec' order by name";
                               $result = mysqli_query($conn, $sql);
                           }
                           $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                           $i = 1;
                           foreach ($rows as $row): ?>
                        <tr bgcolor="white">
                           <td><?php echo $i;  ?></td>
                           <td><?php echo $row['LRN']; ?></td>
                           <td><?php echo $row['name']; ?></td>
                           <td><input type="text" id="sem1" name="sem1"></td>
                           <td><input type="text" id="sem2" name="sem2"></td>
                           <td><input type="text" id="remarks" name="remarks"></td>
                        </tr>
                        <?php $i++; 
                           endforeach;?>
                        
                  </table>
                  <br>
                  <input type="submit" name="encode" value="ENCODE" class="tBtns"/>
            </center>
            </form>
         </div>
         <!-- Contents -->
      </div>
      <!-- Main -->
   </body>
</html>