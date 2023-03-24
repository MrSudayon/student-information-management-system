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
            <a href="admin_dashboard.php"><li><img src="../images/dashboard (2).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Dashboard</h4></li></a>
            <a href="teacher_management.php"><li><img src="../images/teacher2.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Teacher Management</h4></li></a>
            <a href="course_management.php"><li><img src="../images/subject.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Subject Management</h4></li></a>
            <a href="student_management.php"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Student Management</h4></li></a>
            <a href="eventlists.php"><li><img src="../images/announcement1.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Announcement Lists</h4></li></a>
            <a href="../php/logout.php"><li><img src="../images/logout.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Log Out</h4></li></a>
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
                        <form method="POST" action="../student_management.php" enctype="multipart/form-data">
                        <table class="indiv">
                            <tr>
                                <th><input type="text" name="name" placeholder="Name (SN, FN, MN)" style="font-family: Consolas; height: 30px;" require> </th>
                                <th><input type="text" name="lrn" placeholder="LRN" style="font-family: Consolas; height: 30px;" require> </th>
                                <th><input type="text" name="grade" placeholder="Grade" style="font-family: Consolas; height: 30px;" require> </th> 
                                <th><input type="text" name="sec" placeholder="Section" style="font-family: Consolas; height: 30px;" require> </th> 
                                <th><input type="text" name="strand" placeholder="Strand" style="font-family: Consolas; height: 30px;" require> </th> 
                                <th><input type="text" name="orig_sec" placeholder="Originating Section" style="font-family: Consolas; height: 30px;" require> </th> 
                            </tr>
                            <tr>
                                <th><input type="text" name="gen" placeholder="Gender" style="font-family: Consolas; height: 30px;" require> </th> 
                                <th><input type="text" name="en_date" placeholder="Enrolled Date" style="font-family: Consolas; height: 30px;" require> </th> 
                                <th><input type="text" name="add" placeholder="Address" style="font-family: Consolas; height: 30px;" require> </th> 
                                <th><input type="text" name="phone" placeholder="Phone #" style="font-family: Consolas; height: 30px;" require> </th> 
                                <th><input type="text" name="dob" placeholder="Date of Birth" style="font-family: Consolas; height: 30px;" require> </th> 
                                <th><input type="text" name="m_tongue" placeholder="Mother Tounge" style="font-family: Consolas; height: 30px;" require></th>
                            </tr>
                 
                            <tr>

                                <th colspan=6><input type="submit" name="add" class="btn_add" style="width: 180px;" value="ADD"/></th>
                            </tr>
                        </tbody>
                        </table>
                        </form>

                            <?php
                            if(isset($_POST['add'])){
                                $namest = isset($_POST['name']);
                                $LRN = isset($_POST['lrn']);
                                $grade = isset($_POST['grade']);
                                $section = isset($_POST['sec']);
                                $strand = isset($_POST['starnd']);
                                $originating_sec = isset($_POST['orig_sec']);
                                $gender = isset($_POST['gen']);
                                $enrolleddate = isset($_POST['en_date']);
                                $address = isset($_POST['add']);
                                $phone = isset($_POST['phone']);
                                $dob = isset($_POST['dob']);
                                $user = isset($_POST['mother_tongue']);
                                
                                $sql= "INSERT INTO student_tbl (`id`, `name`, `LRN`, `grade`, `section`, `strand`, `originating_sec`, `gender`, `enrolleddate`, `address`, `phone`, `dob`,`user`, `pass`, `enabled`)
                                VALUES (null,'$namest', '$LRN','$grade','$section','$strand','$originating_sec','$gender','$enrolleddate','$address','$phone','$dob','$user','$pass',1)";
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
                        <br>
                        <h3>Students Lists
                            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="text" name="search"/>
                            <button type="submit" name="srch" style="cursor: pointer;">Search</button>
                        </h3>

                        <table class=course_lists style="border: 1px solid black;">
                            <tbody>
                                <tr bgcolor=#363636 style='color:white;'>
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

    <script src="../upload_opt.js"></script> 
    <script src="../sidebar_nav.js"></script>

    </body>
</html>