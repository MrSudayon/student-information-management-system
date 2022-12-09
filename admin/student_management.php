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

            <form method="POST" action="../admin/code_generator.php">
                <?php                       
                $qry = mysqli_query($conn,"SELECT * FROM tbl_code order by ID DESC LIMIT 1");
                while($row=mysqli_fetch_assoc($qry)) {
                ?>        
                    <center>
                    <label class="ccode">Current Code: </label>
                    <input class="txtcode" name="current_code" value="<?php echo $row['ACCESSCODE'];?>">
                    </center>
                <?php    
                }
                ?>
                <button type="submit" class="gencode" name="gencode">Generate New Code</button>
                </center>
            <br>
            <h3>Students Lists</h3>
            <?php
                $ins =  "SELECT * FROM user 
                        WHERE UTYPE = 3";
                $res = $conn->query($ins);

                if ($res->num_rows > 0) 
                {
                        echo "<table class=course_lists >";
                            echo "<center>";
                            echo "<tbody>";
                            echo "<tr bgcolor=#363636 style='color:white'>";
                                echo "<th>Grade</th>";
                                echo "<th>Department</th>";
                                echo "<th>LRN</th>";
                                echo "<th>Last Name</th>";
                                echo "<th>First Name</th>";
                                echo "<th>Middle initial</th>";
                                echo "<th>Suffix</th>";
                                echo "<th>Section</th>";
                                echo "<th>Date of Birth</th>";
                                echo "<th>Download Grades</th>";
                                echo "<th>Is Enrolled</th>";
                                echo "<th colspan=2>Action</th>";
                            echo "</tr>";
                    while($row = $res->fetch_assoc()) 
						{   
                            echo "<tr>";
                                echo "<td width=5%;>12</td>";
                                echo "<td width=8%;>STEM</td>";
                                echo "<td width=20%;>" . $row['LRN'];
                                echo "<td width=15%;>" . $row['LAST']; 
                                echo "<td width=15%>" . $row['FIRST'];
                                echo "<td width=7%;>" . $row['MID'];
                                echo "<td> Jr. </td>";
                                echo "<td width=5%;> 3 </td>";
                                echo "<td width=15%;>12-23-2022</td>";
                                echo "<td width=10%;> .pdf .docx </td>";    
                                echo "<td>No</td>";
                                ?> 
                                    <td><a href="../actions/update.php?id=<?php echo ($row['LRN']);?>" class="update_btn">UPDATE</a></td>
                                    <td><a href="../actions/remove.php?id=<?php echo ($row['LRN']); ?>" class="delete_btn">REMOVE</a></td>
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
<!-- Main -->
 </div>


<script src="../sidebar_nav.js"></script>

</body>
</html>