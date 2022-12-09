<?php
    include "../php/dbase_config.php";
    
    $id = '';
    $sub_code = '';
    $sub_name = '';
    $sub_unit = '';
    $sub_desc = '';
    $sub_prof = '';
    $dept = '';
    $sub_img = '';
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
        <title>Course Management</title>
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
    <h2><button class="openbtn" onclick="openNav()">☰</button>&nbsp;&nbsp;Course Management</h2>  
    <button class="openbtn1" onclick="openNav1()">☰</button>
    <!-- Contents -->
        <div class="dashb_content">
            <hr class="line">       
            
            
            <div class="add_tbl">
                <h3>Add Course</h3>
                <div class="content">
                    <form method="POST" action="../admin/course_management.php">
                        <table class="add_course">
                            <tr>   
                                <th colspan=3> <label for="file" style="font-family: Consolas; height: 30px; font-weight:500;">Select Image:</label>
                                               <input type="file" name="file" class="course_image" style="font-family: Consolas; height: 30px;" require></th>
                            </tr>
                            <tr>
                                <th><input type="text" name="course_code" placeholder="Course Code" style="font-family: Consolas; height: 30px;" require> </th>
                                <th><input type="text" name="course_name" placeholder="Course Name" style="font-family: Consolas; height: 30px;" require> </th>
                                <th><input type="text" name="course_desc" placeholder="Description" style="font-family: Consolas; height: 30px;" require> </th>
                            </tr>
                            <tr>
                                <td>Course Code</td>
                                <td>Course Name</td>
                                <td>Description</td>
                            </tr>
                            <tr>
                                <th><input type="text" name="course_unit" placeholder="Units" value="3.0" style="font-family: Consolas; height: 30px;" require> </th>
                                <th><input type="text" name="department" placeholder="Department" style="font-family: Consolas; height: 30px;" require> </th>
                                <th><label for="assign"></label>
                                    <select id="assign" name="assign" style="font-family: Consolas; height: 30px; width: 100%;" require>
                                        <option value="instructor 1">Instructor 1</option>
                                        <option value="instructor 2">Instructor 2</option>
                                        <option value="instructor 3">Instructor 3</option>
                                    </select>
                                </th>
                            </tr>
                            <tr>
                                <td>Unit</td>
                                <td>Department</td>
                                <td>Assign to:</td>
                            </tr>
                            <tr>
                                <th colspan=3><button type="submit" name="add" class="btn_add">ADD</button></th>
                            </tr>
                        </table>
                    </form>

                    <?php
                     $sub_code = '';
                     $sub_name = '';
                     $sub_unit = '';
                     $sub_desc = '';
                     $sub_prof = '';
                     $dept = '';
                     $sub_img = '';

                        if(isset($_POST['add'])) {
                            $c_name = $_POST['course_name'];
                            $c_code = $_POST['course_code'];
                            $c_desc = $_POST['course_desc'];
                            $c_unit = $_POST['course_unit'];     
                            $c_dateadd = date("Y-m-d");       
                            $c_assign = $_POST['assign'];
                            $department = $_POST['department'];

                            $c_image = $_FILES['file']['name'];
							$target_dir = "./images/subj_imgs/";

							// Select file type
							$imageFileType = pathinfo($target_dir,PATHINFO_EXTENSION);

							// Valid file extensions
							$extensions_arr = array("jpg","jpeg","png","gif","webp");

							// Check extension
							if( in_array($imageFileType,$extensions_arr) ){
								// Upload file
								if(move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$c_image)){
									// Convert to base64 
									$image_base64 = base64_encode(file_get_contents('../images/subj_imgs/'.$c_image) );
									$image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
									// Insert record
                                }
                            }
                                
                                
                            
                                $add = "INSERT INTO subject_tbl (subj_id, subj_name, subj_code, subj_desc, unit, date_added, assignedto, subj_key, dept, subj_image, archive)
                                VALUE (null, '$c_name', '$c_code', '$c_desc', '$c_unit', '$c_dateadd', '$c_assign', 'samplekey', '$department','$c_image',0)";
                                $conn->query($add);
                                ?>
                                    <script>
                                        alert("New Record Added!");
                                    </script>
                                <?php
                                echo "<meta http-equiv='refresh' content='0'>";
                                mysqli_free_result($add);

                       
                     

                        }
                    ?>
                </div>
            </div>
            
            <br>
            <hr class="line">       
            <h3>Course Lists</h3>
            <?php
                $sel = "SELECT * FROM subject_tbl WHERE archive=0";
                $result = $conn->query($sel);

                if ($result->num_rows > 0) 
                    {   
                        echo "<table class=course_lists>";
                            echo "<tbody>";
                            echo "<tr bgcolor=#363636 style='color:white'>";
                            echo "<th>Course Code</th>";
                            echo "<th>Course Name</th>";
                            echo "<th>Image</th>";
                            echo "<th>Description</th>";
                            echo "<th>Units</th>";
                            echo "<th>Department</th>";
                            echo "<th>Date Added</th>";
                            echo "<th>Assigned to</th>";
                            echo "<th>Course Key-Code</th>";
                            echo "<th colspan=2>Action</th>";
                        echo "</tr>";
                    while($row = $result->fetch_assoc()) 
						{   
                            echo "<tr>";
                                echo "<td width=7%;>" . $row["subj_code"];
                                echo "<td width=20%;>" . $row["subj_name"];
                                ?>
                                    <td>
                                      <img src="<?php echo "../images/subj_imgs/".$row["subj_image"]; ?>" width='50px' height='50px'>
                                    </td>
                                <?php
                                echo "<td width=30%;>" . $row["subj_desc"];
                                echo "<td width=5%;>" . $row["unit"];
                                echo "<td width=8%;>" . $row["dept"];
                                echo "<td width=8%;>" . $row["date_added"];
                                echo "<td width=14%;>" . $row["assignedto"];
                                echo "<td width=5%;>" . $row["subj_key"];    
                                ?> 
                                    <td><a href="../actions/update.php?id=<?php echo ($row['subj_id']); ?>&subj_code=<?php echo ($row['subj_code']); ?>" class="update_btn">UPDATE</a></td>
                                    <td><a href="../actions/remove.php?id=<?php echo ($row['subj_code']); ?>" class="delete_btn">REMOVE</a></td>
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
                
        </div>
    <!-- Contents -->
</div>
<!-- Main -->
  





  
<script src="../sidebar_nav.js"></script>

</body>
</html>