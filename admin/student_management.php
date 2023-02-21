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
        <a href="course_management.php"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Course Management</h4></li></a>
        <a href="student_management.php"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Student Management</h4></li></a>
        <!--<a href="user_settings.php"><li><img src="../images/settings.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">User Settings</h4></li></a>-->
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
 
        <h1>Upload Excel File</h1>
        <br>
            <form method="POST" action="../action/import.php" enctype="multipart/form-data">
                <div class="">
                    <label>Upload Excel File</label>
                    <input type="file" name="import_file" class="form-control">
                </div>
                <div class="">
                    <button type="submit" name="save_excel_data" class="btn btn-success">Upload</button>
                </div>
            </form>
        
        </form>
<br><br><br>
    </div>
    <div id="response" class="<?php 
    if(!empty($type)) { 
        echo $type . " display-block"; 
    } ?>">
    <?php if(!empty($message)) { 
        echo $message; 
        } ?>
    </div>
    
          </div>
        </div>
     </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
            <br>
            <h3>Students Lists</h3>

            <table class=course_lists >
                <center>
                <tbody>
                <tr bgcolor=#363636 style='color:white'>
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
                    $sqlst = "SELECT * FROM student_tbl";
                    $row1 = $conn->query($sqlst);

                    if ($row1->num_rows > 0){
                ?>
                <tr bgcolor = white>
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
                    }
                ?>
                </tbody>
            </table>
    
    </div>
</div>
<!-- Main -->


<script src="../sidebar_nav.js"></script>

</body>
</html>