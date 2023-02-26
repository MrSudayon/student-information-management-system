<?php
    include "../php/dbase_config.php";
    require_once "../php/auth.php";

   if(isset($_POST['add'])) {
        $c_name = $_POST['course_name'];
        $c_code = $_POST['course_code'];
        $c_desc = $_POST['course_desc'];
        $c_dateadd = date("Y-m-d");       
        $department = strtoupper($_POST['department']);

        $c_image = basename($_FILES["file"]["name"]);
		$destination = "../imgsubject/";
        $tempname =$_FILES["file"]["tmp_name"];
		$target_dir=$destination.$c_image;
		
		// Select file type
		$imageFileType = pathinfo($target_dir,PATHINFO_EXTENSION);

		// Valid file extensions
		$extensions_arr = array("jpg","jpeg","png","gif","webp");

			// Check extension
		if( in_array($imageFileType,$extensions_arr) ){
			if(!file_exists($target_dir)){					// Upload file
    			if(move_uploaded_file($tempname,$target_dir)){
    			    $image_base64 = base64_encode(file_get_contents('../imgsubject/'.$c_image) );
                    $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
                                        
                    try {
                        $add = "INSERT INTO subject_tbl (subj_name, subj_code, subj_desc, date_added, dept, subj_image, archive) VALUES ('$c_name', '$c_code', '$c_desc', '$c_dateadd', '$department','$c_image',0)";
                        $conn->query($add);

                        ?>
                            <script>
                                alert("New Record Added!");
                            </script>
                        <?php	
                        echo "<meta http-equiv='refresh' content='0'>";
                    }catch (mysqli_sql_exception $e) {
                        var_dump($e);
                        exit;
                    }
    			}
			} else {
			    ?>
			    <script>
                   alert(<?php echo $cimage;?>" already exist");
                </script>
			    <?php
                echo "<meta http-equiv='refresh' content='0'>";
			}
        }
    } else {
        echo (mysqli_error($conn));
    }
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
        <a href="course_management.php"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Subject Management</h4></li></a>
        <a href="student_management.php"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Student Management</h4></li></a>
        <a href="eventlists.php"><li><img src="../images/settings.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Announcement Lists</h4></li></a>
        <a href="../php/logout.php"><li><img src="../images/settings.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Log Out</h4></li></a>
    </ul>
</div>
<!-- sidebar -->
  
<!-- Main -->
<div id="main">
    <h2><button class="openbtn" onclick="openNav()">☰</button>&nbsp;&nbsp;Subjects Management</h2>  
    <button class="openbtn1" onclick="openNav1()">☰</button>
    <!-- Contents -->
        <div class="dashb_content">
            <hr class="line">       
            
            <div class="add_tbl">
                <h3>Add Subjects</h3>
                <div class="content">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
         
                        <table class="add_course">
                            <tr>   
                                <th colspan=3> 
                                    <label for="file" style="font-family: Consolas; height: 30px; font-weight:500;">Course Image:</label>
                                    <input type="file" name="file" class="course_image" style="font-family: Consolas; height: 30px;">
                                </th>
                            </tr>

                            <tr>
                                <th><input type="text" name="course_code" placeholder="Subject Code" style="font-family: Consolas; height: 30px;" require> </th>
                                <th><input type="text" name="course_name" placeholder="Subject Name" style="font-family: Consolas; height: 30px;" require> </th>
                                <th><input type="text" name="course_desc" placeholder="Description" style="font-family: Consolas; height: 30px;" require> </th>
                            </tr>
                            
                            <tr>
                                <td>Subject Code</td>
                                <td>Subject Name</td>
                                <td>Description</td>
                            </tr>

                            <tr>
                                <th colspan=2><input type="text" name="department" placeholder="Department" style="font-family: Consolas; height: 30px;" require> </th>
                                <th><select id="assign" name="assign" style="font-family: Consolas; height: 30px; width: 100%;">
                                        <option value="instructor 1">Instructor 1</option>
                                        <option value="instructor 2">Instructor 2</option>
                                        <option value="instructor 3">Instructor 3</option>
                                    </select>
                                </th>
                            </tr>
                            <tr>
                                <td colspan=2>Department</td>
                                <td>Assign to:</td>
                            </tr>
                            <tr>
                                <th colspan=3><input type="submit" name="add" class="btn_add" value="ADD"/></th>
                            </tr>
                        </table>

                    </form>
                </div>
            </div>
            
            <hr>       
            <h3>Subjects Lists</h3>
            <?php
                $sel = "SELECT * FROM subject_tbl WHERE archive=0 ORDER BY dept ASC";
                $result = $conn->query($sel);

                if ($result->num_rows > 0) 
                    {   
                        echo "<table class=course_lists>";
                            echo "<tbody>";
                            echo "<tr bgcolor=#363636 style='color:white'>";
                            echo "<th>Subject Code</th>";
                            echo "<th>Subject Name</th>";
                            echo "<th>Image</th>";
                            echo "<th>Description</th>";
                            echo "<th>Date Added</th>";
                            echo "<th colspan=2>Action</th>";
                        echo "</tr>";
                    while($row = $result->fetch_assoc()) 
						{   
                            echo "<tr bgcolor=white>";
                                echo "<td>" . $row["subj_code"];
                                echo "<td>" .$row["subj_name"];
                                ?>
                                    <td>
                                      <img src="<?php echo "../imgsubject/".$row['subj_image']; ?>" width='50px' height='50px'>
                                <?php
                                echo "<td>" . $row["subj_desc"];
                                echo "<td>" . $row["date_added"];
                                ?> 
                                    <td><a href="../actions/subj_update.php?id=<?php echo ($row['subj_id']); ?>&subj_code=<?php echo ($row['subj_id']); ?>" class="update_btn">UPDATE</a></td>
                                    <td><a href="remove.php?id=<?php echo ($row['subj_id']); ?>" class="delete_btn">REMOVE</a></td>
                                <?php
                        }
                            echo "</tr>";
                            echo "</tbody>";
                        echo "</table>";
                   
                    } else {
                                        
                        echo "<CENTER><p style='color:red' font-size='3em'> 0 results </p></CENTER>";
                                    
                    }
                
            ?>

        
                
        </div>
    <!-- Contents -->
</div>
<!-- Main -->
  
  
<script src="../sidebar_nav.js"></script>

</body>
</html>