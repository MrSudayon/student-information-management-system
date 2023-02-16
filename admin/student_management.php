<?php 
    include "../php/dbase_config.php";
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
</head>

<body>
    
<!-- sidebar -->
<div class="side-menu" id="mySidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <div class="smateo-logo">
        <img src="../images/smateo-shs.png" style="width: 70%;">
    </div>
    <ul>
        <a href="admin_dashboard.php"><li><img src="../images/dashboard (2).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Dashboard</h4></li></a>
        <a href="teacher_management.php"><li><img src="../images/teacher2.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Teacher Management</h4></li></a>
        <a href="course_management.php"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Subject Management</h4></li></a>
        <a href="student_management.php"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Student Management</h4></li></a>
        <a href="user_settings.php"><li><img src="../images/settings.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">User Settings</h4></li></a>
        <a href="../index.html"><li><img src="../images/settings.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Log Out</h4></li></a>
    </ul>
</div>
<!-- sidebar -->
  
<!-- Main -->
<div id="main">
    <h2><button class="openbtn" onclick="openNav()">☰</button>&nbsp;&nbsp;Student Management</h2>  
    <button class="openbtn1" onclick="openNav1()">☰</button>
   <!-- Contents -->
   <div class="dashb_content">
            
            <hr class="line">     
            <center>
            <br>

            <form method="POST" action="">
                    <center>
                        <label class="ccode">Upload Excel File: </label>
                        <input type="file" name="excel" required>
                        
                    </center>
                    <!-- SELECT DEPARTMENT
                        <br>
                        <select id='dept' name='dept' required>
                            <option>Select department</option>
                            <option value='STEM'>STEM</option>
                            <option value='ABM'>ABM</option>
                            <option value='HUMSS'>HUMSS</option>
                            <option value='TECHVOC'>TECHVOC</option>
                        </select>
                        <br>
                    -->
                    <br>
                <button type="submit" class="gencode" name="import">Import Data</button>
            </form>
             
            <br>
            <h3>Students Lists</h3>

            <table class=course_lists >
                <center>
                <tbody>
                <tr bgcolor=#363636 style='color:white'>
                    <th>#</th>
                    <th>Name</th>
                    <th>LRN</th>
                    <th>Grade</th>
                    <th>Gender</th>
                    <th>Enrolled Date</th>
                    <th>Phone #</th>
                    <th>Address</th>
                    <th>Date of Birth</th>
                    <th colspan=2>Action</th>
                </tr>
                <?php 
                    $i = 1;
                    $rows = mysqli_query($conn, "SELECT * FROM student_tbl");
                    foreach($rows as $row1) :
                ?>
                <tr bgcolor = white>
                    <td> <?php echo $i++; ?> </td>
                    <td> <?php echo $row1['name']; ?> </td>
                    <td> <?php echo $row1['LRN']; ?> </td>
                    <td> <?php echo $row1['grade']; ?> </td>
                    <td> <?php echo $row1['gender']; ?> </td>
                    <td> <?php echo $row1['enrolleddate']; ?> </td>
                    <td> <?php echo $row1['phone']; ?> </td>
                    <td> <?php echo $row1['address']; ?> </td>
                    <td> <?php echo $row1['dob']; ?> </td>
                    
                    <td><a href="#?id=<?php echo ($row1['LRN']);?>" class="update_btn">UPDATE</a></td>
                    <td><a href="../actions/remove.php?id=<?php echo ($row1['id']); ?>" class="delete_btn">REMOVE</a></td>
                </tr>
                <?php
                    endforeach 
                ?>
                </tbody>
            </table>
    
            <!-- IMPORT STUDENTS DATA FROM EXCEL -- FUNCTION -->
            <?php
                if(isset($_POST["import"])) {
                    $fileName = $_FILES["excel"]["name"];
                    $fileExtension = explode('.', $fileName);
                    $fileExtension = strtolower(end($fileExtension));

                    $newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;

                    $targetDirectory = "../uploads/stddata/" . $newFileName;
                    move_uploaded_file($_FILES["excel"]["tmp_name"], $targetDirectory);

                    error_reporting(0);
                    ini_set('display_errors', 0);

                    require "../excelReader/excel_reader2.php"; 
                    require "../excelReader/SpreadsheetReader.php";

                    $reader = new SpreadsheetReader($targetDirectory);
                    foreach($reader as $key => $row1)
                        $lname = $row1[0];
                        $fname = $row1[1];
                        $mn = $row1[2];
                        $lrn = $row1[3];
                        $grade = $row1[4];
                        $gender = $row1[5];
                        $enrolleddate = $row1[6];

                        $dataadd = mysqli_query($conn, "INSERT INTO students_tbl VALUES('' ,'$lname' ,'$fname' ,'$mn' ,'$lrn' ,'$grade' ,'$gender' ,'$enrolleddate' ,'' ,'' ,'' ,'$lname' ,'smshs123','3','ACTIVE')");
                
                    if($dataadd == TRUE ) {
                        echo "
                            <script>
                            alert('Record Added Successfully');
                            document.location.href = '';
                            </script>
                        ";
                    } 
                }   
            ?>
            <!-- IMPORT STUDENTS DATA FROM EXCEL -- FUNCTION -->

            <br><hr>
            <!--
            <form method="POST" action="../admin/code_generator.php">
                <php              
                $qry = mysqli_query($conn,"SELECT * FROM tbl_code order by ID DESC LIMIT 1");
                while($row=mysqli_fetch_assoc($qry)) {
                ?>        
                    <center>
                    <label class="ccode">Current Code: </label>
                    <input class="txtcode" name="current_code" value="<php echo $row['ACCESSCODE'];?>">
                    </center>
                <php
                }
                ?>
                <button type="submit" class="gencode" name="gencode">Generate New Code</button>
                </center>
            
            <br>
            <h3>Students Lists</h3
            -->
            <?php
                $sql =  "SELECT * FROM students_tbl WHERE std_STATUS = 'ACTIVE' ";
                $res = $conn->query($sql);

                if ($res->num_rows > 0) 
                {
                        echo "<table class=course_lists >";
                            echo "<center>";
                            echo "<tbody>";
                            echo "<tr bgcolor=#363636 style='color:white'>";
                                echo "<th>#</th>";
                                echo "<th>Name</th>";
                                echo "<th>LRN</th>";
                                echo "<th>Grade</th>";
                                echo "<th>Gender</th>";
                                echo "<th>Enrolled Date</th>";
                                echo "<th>Address</th>";
                                echo "<th>Phone #</th>";
                                echo "<th>Date of Birth</th>";
                                echo "<th>User</th>";
                                echo "<th>Password</th>";
                                echo "<th colspan=2>Action</th>";
                            echo "</tr>";
                    while($row = $res->fetch_assoc()) 
						{   
                            echo "<tr bgcolor = white>";
                                echo "<td>" . $row['id'];
                                echo "<td width=25%;>" . strtoupper($row['std_LAST']),", ". $row['std_FIRST']," ". $row['std_MID']; 
                                echo "<td width=15%;>" . $row['LRN'];
                                echo "<td width=10%>" . $row['GRADE'];
                                echo "<td width=7%;>" . $row['GENDER'];
                                echo "<td width=5%;>" . $row['ENROLLEDDATE'];
                                echo "<td width=10%;>" . $row['ADDRESS'];
                                echo "<td width=7%;>" . $row['PHONE'];
                                echo "<td width=8%;>" . $row['DOB'];
                                echo "<td>" . $row['std_USER'];
                                echo "<td>" . $row['std_PASS'];
                                ?> 
                                    <td><a href="#?id=<?php echo ($row['LRN']);?>" class="update_btn">UPDATE</a></td>
                                    <td><a href="../actions/remove.php?id=<?php echo ($row['id']); ?>" class="delete_btn">REMOVE</a></td>
                                <?php 
                        }
                            echo "</tr>";
                            echo "</tbody>";
                        echo "</table>";
                   
                    } else {
                                        
                        echo "<CENTER><p style='color:red' font-size='3em'> 0 results </p></CENTER>";
                                    
                    }
                
                    $conn->close();
            ?>
    <!-- Contents -->
    </div>
</div>
<!-- Main -->


<script src="../sidebar_nav.js"></script>

</body>
</html>