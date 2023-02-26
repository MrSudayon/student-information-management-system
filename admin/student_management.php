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
    </head>
    <body>
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
                <a href="eventlists.php"><li><img src="../images/settings.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Announcement Lists</h4></li></a>
                <a href="../php/logout.php"><li><img src="../images/settings.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Log Out</h4></li></a>
            </ul>
        </div>
        <div id="main">
                <h2><button class="openbtn" onclick="openNav()">☰</button>&nbsp;&nbsp;Student Management</h2>  
                <button class="openbtn1" onclick="openNav1()">☰</button>
                    <!-- Contents -->
                <div class="dashb_content">
                        
                        <hr class="line">     
                        <br>
                <center>
                    <h1>Upload Excel File</h1>
                    <br>
                        <form method="POST" action="../actions/import.php" enctype="multipart/form-data">
                            <div class="">
                                <label>Upload Excel File</label>
                                <input type="file" name="file" class="form-control">
                            </div>
                            <br><br>
                            <div class="">
                                <button type="submit" name="save_excel_data" class="btn btn-success">Upload</button>
                            </div>
                        </form>
                </center>
                        <br>
                        <h3>Students Lists</h3>

                        <table class=course_lists >
                            <tbody>
                                <tr bgcolor=#363636 style='color:white'>
                                    <th>Name</th>
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
                                    $sql = mysqli_query($conn, "SELECT * FROM student_tbl ORDER BY enabled DESC");
                                    foreach($sql as $row) :
                                        
                                        $en = $row['enabled'];
                                    if($en=='0') {
                                        ?>
                                            <tr bgcolor='#ffcccb'>
                                        <?php
                                    }else {
                                        ?>
                                            <tr bgcolor=white>
                                        <?php
                                    }
                                ?>
                                
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
                                    endforeach 
                                ?>
                            </tbody>
                        </table>
                </div>
        </div>

  
    <script src="../sidebar_nav.js"></script>

    </body>
</html>