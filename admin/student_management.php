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
    <title>Student Management</title>

    <style>
        .btn_Upl {
            cursor: pointer;
            border: 1px black solid;
            margin: 6px;
            padding: 5px 10px;
        }
        #excel-up, #manual-up {
            display: none;
        }
        
        
    </style>
</head>
<body>
    <div class="side-menu" id="mySidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <div class="smateo-logo">
            <img src="../images/smateo-shs.png" style="width: 70%;">
        </div>
        <?php include "./admin_nav.php"; ?>
    </div>
    <div id="main">
            <h2><button class="openbtn" onclick="openNav()">☰</button>&nbsp;&nbsp;Student Management</h2>  
            <button class="openbtn1" onclick="openNav1()">☰</button>
                <!-- Contents -->
            <div class="dashb_content">
                    
            <hr class="line">     
                <br>
                                    
            <center>  
            <!-- Excel Upload >> show if active -->
            <div id="excel-up">
                <h1>Batch Upload</h1>
                <br>
                    <form method="POST" action="../actions/import.php" enctype="multipart/form-data">
                        <table>
                        <tbody>
                        <tr>
                            <th><label>Upload Excel File</label></th>
                            <th><input type="file" name="file" class="form-control"></th>
                            <th><button type="submit" name="save_excel_data" class="btn_add" style="width: 180px;">Upload</button></th>
                        </tr>
                        </table>
                    </form>
                <br>
                <br>
            </div>
            <!-- Manual Upload >> show if active -->
            <div id="manual-up">
                <h1>Individual</h1>
                    <form method="POST" action="student_management.php" enctype="multipart/form-data">
                    <table class="indiv">
                        <tr>
                            <th><input type="text" name="name" placeholder="Name (SN, FN, MN)" style="font-family: Consolas; height: 30px;" required></th>
                            <th><input type="text" name="lrn" placeholder="LRN" style="font-family: Consolas; height: 30px;" required> </th>
                            <th><input type="text" name="grade" placeholder="Grade" style="font-family: Consolas; height: 30px;" required> </th> 
                            <th><input type="text" name="sec" placeholder="Section" style="font-family: Consolas; height: 30px;" required> </th> 
                            <th><input type="text" name="strand" placeholder="Strand" style="font-family: Consolas; height: 30px;" required> </th> 
                            <th><input type="text" name="orig_sec" placeholder="Originating Section" style="font-family: Consolas; height: 30px;" required> </th> 
                        </tr>
                        <tr>
                            <th><input type="text" name="gen" placeholder="Gender" style="font-family: Consolas; height: 30px;" required> </th> 
                            <th><input type="text" name="en_date" placeholder="Enrolled Date" style="font-family: Consolas; height: 30px;" required> </th> 
                            <th><input type="text" name="address" placeholder="Address" style="font-family: Consolas; height: 30px;" required> </th> 
                            <th><input type="text" name="phone" placeholder="Phone #" style="font-family: Consolas; height: 30px;" required> </th> 
                            <th><input type="text" name="dob" placeholder="Date of Birth" style="font-family: Consolas; height: 30px;" required> </th> 
                            <th><input type="text" name="m_tongue" placeholder="Mother Tounge" style="font-family: Consolas; height: 30px;" required></th>
                        </tr>
                
                        <tr>
                            <th colspan=6><input type="submit" name="add" class="btn_add" style="width: 180px;" value="ADD"/></th>
                        </tr>
                    </tbody>
                    </table>
                    </form>

                        <?php
                        if(isset($_POST['add'])){
                            $namest = $_POST['name'];
                            $LRN = $_POST['lrn'];
                            $grade = $_POST['grade'];
                            $section = $_POST['sec'];
                            $strand = $_POST['strand'];
                            $originating_sec = $_POST['orig_sec'];
                            $gender = $_POST['gen'];
                            $enrolleddate = $_POST['en_date'];
                            $address = $_POST['address'];
                            $phone = $_POST['phone'];
                            $dob = $_POST['dob'];
                            $user = $_POST['mother_tongue'];
                            
                            $sql= "INSERT INTO student_tbl VALUES (null,'$namest', '$LRN','$grade','$section','$strand','$originating_sec','$gender','$enrolleddate','$address','$phone','$dob','$user','$pass',1)";
                            if (mysqli_query($conn, $sql)) {
                                echo "New record created successfully";
                            } else {
                                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            }
                        }
                        ?>
            </div>
                <!-- show/hide-->
                <br>
                <button id="btn_Upload" class="btn_Upl" onclick="toggleVisibility('excel-up','toggleVisibility')">UPLOAD STUDENT DATA</div>
                <br><br>
                <hr>
            </center>
            <center> 
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">    
        <h3>Students Lists <br>
            <input type="text" name="search" style="padding: 5px 10px;"/>
            <button type="submit" name="srch" style="cursor: pointer; padding: 5px 10px;">Search</button>
        </h3>
        
        <table>
            <tbody>
                <tr>
                    <th>
                    <?php  
                            $query1 ="SELECT DISTINCT grade FROM student_tbl";
                            $result1 = $conn->query($query1);
                            if($result1->num_rows> 0){
                                $options1= mysqli_fetch_all($result1, MYSQLI_ASSOC);
                            }
                            ?>
                            <select id="grade" name="grade" style="font-family: Consolas; height: 30px; width: 100%;">
                                <option>Select Grade</option>
                                <?php 
                                foreach ($options1 as $option1) {
                                ?>
                                    <option><?php echo $option1['grade']?> </option>
                                <?php 
                                    }
                                ?>
                            </select>
                    </th>
                    <th>
                        <?php  
                            $query ="SELECT DISTINCT section FROM student_tbl";
                            $result = $conn->query($query);
                            if($result->num_rows> 0){
                                $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
                            }
                            ?>
                            <select id="section" name="section" style="font-family: Consolas; height: 30px; width: 100%;">
                                <option>Select Section</option>
                                <?php 
                                foreach ($options as $option) {
                                ?>
                                    <option><?php echo $option['section']?> </option>
                                <?php 
                                    }
                                ?>
                            </select>
                    </th>
                    <th>
                        <button type='submit' name='btnFilter' style="cursor: pointer; padding: 5px 10px;">Filter</button>
                        <button type='submit' name='clearFilter' style="cursor: pointer; padding: 5px 10px;">Clear Filter</button>
                    </th> 
                </tr>
            </tbody>
        </table>
        <br>
        </form>
                <table class='course_lists' style="border: 1px solid black;">
                    <tbody>
                        <tr bgcolor='#363636' style='color:white;'>
                            <th>NO.</th>
                            <th style="width: 15%;">Name</th>
                            <th>LRN</th>
                            <th>Grade</th>
                            <th>Section</th>
                            <th>Strand</th>
                            <th>Originating Section</th>
                            <th>Gender</th>
                            <th>Enrolled Date</th>
                            <th>Address</th>
                            <th>Phone #</th>
                            <th>Date of Birth</th>
                            <th colspan=2>Action</th>
                        </tr>
                        
                        <?php
                            $sql = "SELECT * FROM student_tbl order by enabled DESC, name";
                        if(isset($_POST['srch'])) {
                            $searched = $_POST['search'];
                            $sql = "SELECT * FROM student_tbl WHERE name LIKE '%".$searched."%' ORDER BY name";
                        }
                        
                        if(isset($_POST['btnFilter'])){
                            $selected_sec = $_POST['section'];
                            $selected_grade = $_POST['grade'];

                            $sql = "SELECT * FROM student_tbl where section='$selected_sec' OR grade='$selected_grade' order by name";
                        } 
                        elseif(isset($_POST['clearFilter'])){
                            $sql = "SELECT * FROM student_tbl order by enabled DESC, name";
                        }

                            $result = mysqli_query($conn, $sql);
                            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

                            $i = 1;
                        foreach ($rows as $row): 
                        $en = $row['enabled']; 
                        
                        if($en == '1') {                   
                        ?>
                            <tr bgcolor="white" style='color: #363636;'>
                        <?php 
                        } elseif($en == '0') {
                        ?>
                            <tr bgcolor='#ffcccb' style='color: #363636;'>
                        <?php
                        }
                        ?>
                            <td> <?php echo $i;?> </td>
                            <td> <?php echo $row['name']; ?> </td>
                            <td> <?php echo $row['LRN']; ?> </td>
                            <td> <?php echo $row['grade']; ?> </td>
                            <td> <?php echo $row['section']; ?> </td>
                            <td> <?php echo $row['strand']; ?> </td>
                            <td> <?php echo $row['originating_sec']; ?> </td>
                            <td> <?php echo $row['gender']; ?> </td>
                            <td> <?php echo $row['enrolleddate']; ?> </td>
                            <td> <?php echo $row['address']; ?> </td>
                            <td> <?php echo $row['phone']; ?> </td>
                            <td> <?php echo $row['dob']; ?> </td>
                            
                            <td><a href="../actions/std_update.php?id=<?php echo ($row['id']);?>" class="update_btn">UPDATE</a></td>
                            <td><a href="../actions/std_remove.php?id=<?php echo ($row['id']); ?>" class="delete_btn">REMOVE</a></td>
                        </tr>
                        <?php
                            $i++; 
                            endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

<script src="../upload_opt.js"></script> 
<script src="../sidebar_nav.js"></script>

</body>
</html>