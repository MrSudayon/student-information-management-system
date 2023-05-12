
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
        <title>Subject Management</title>
    </head>

<body>
    
<!-- sidebar -->
<div class="side-menu" id="mySidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <div class="smateo-logo">
        <img src="../images/smateo-shs.png" style="width: 70%;">
    </div>
    <?php include "./admin_nav.php"; ?>
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
                                <th>Thumbnail image</th>
                                <th>Subject Code</th>
                                <th>Subject Name</th>
                                <th>Description</th>
                                <th>Grade and Sem</th>
                                <th>Department</th>
                                <th>Assign to:</th>
                            </tr>
                            <tr>
                                <th><input type="file" name="file" class="course_image" style="font-family: Consolas; height: 30px;"></th>
                                <th><input type="text" name="course_code" placeholder="Course Code" style="font-family: Consolas; height: 30px;" require> </th>
                                <th><input type="text" name="course_name" placeholder="Course Name" style="font-family: Consolas; height: 30px;" require> </th>
                                <th><input type="text" name="course_desc" placeholder="Description" style="font-family: Consolas; height: 30px;" require> </th>
                                <th><input type="text" name="gradesem" placeholder="Grade-Semester" style="font-family: Consolas; height: 30px;" require> </th>
                                <th><input type="text" name="department" placeholder="Department" style="font-family: Consolas; height: 30px;" require> </th> 
                                <th>
                                    <?php  
                                        $query ="SELECT tchr_FIRST,tchr_MID,tchr_LAST FROM teachers_tbl WHERE tchr_STATUS = 'ACTIVE'";
                                        $result = $conn->query($query);
                                        if($result->num_rows> 0){
                                            $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
                                        }
                                    ?>
                                    <select id="assign" name="assign" style="font-family: Consolas; height: 30px; width: 100%;">
                                        <option>Select Instructor</option>
                                        <?php 
                                        foreach ($options as $option) {
                                        ?>
                                            <option><?php echo $option['tchr_FIRST'].", ".$option['tchr_MID'].". ".$option['tchr_LAST']; ?> </option>
                                        <?php 
                                            }
                                        ?>
                                    </select>
                                </th>

                                <th colspan=3><input type="submit" name="add" style="cursor: pointer; padding: 5px 10px;" value="ADD"/></th>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <br>
            <hr class="line"> 
            <br>    
            <h3>Subjects List</h3>
            <center>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                    <label for="strand">Filter:</label>
                    <select name="strand" id="strand" style="padding: 5px 10px;">
                    <option value="">Select Strand</option>
                    <option value="STEM">STEM</option>
                    <option value="ABM">ABM</option>
                    <option value="HUMSS">HUMSS</option>
                    <option value="Techvoc">Techvoc</option>
                    </select>
                    <input type="submit" name="btnsearch" style="cursor: pointer; padding: 5px 10px;" value="Filter"/>
                    <input type="submit" name="clear" style="cursor: pointer; padding: 5px 10px;" value="Clear"/>
                </form>
            </center>      
            <br>
            <?php

                if(isset($_POST['clear'])){
                    $sel = "SELECT * FROM subject_tbl WHERE archive=0 ORDER BY dept DESC";
                }
                if(isset($_POST['btnsearch'])){
                    if(!empty($_POST['strand'])) {
                        $strand=$_POST['strand'];
                    }else{
                        ?>
                        <script>
                            alert('Please choose a strand to filter');
                        </script>
                        <?php
                        $sel = "SELECT * FROM subject_tbl WHERE archive =0 ";
                    }
                    $sel = "SELECT * FROM subject_tbl WHERE dept ='$strand' && archive =0 ";
                    
                }else{
                    $sel = "SELECT * FROM subject_tbl WHERE archive=0 ORDER BY dept DESC";
                }
                $result = $conn->query($sel);

                if ($result->num_rows > 0) 
                    {   
                        echo "<table class=course_lists >";
                            echo "<tbody>";
                            echo "<tr bgcolor=#363636 style='color:white;, text-align:center;'>";
                            echo "<th>Subject Code</th>";
                            echo "<th>Subject Name</th>";
                            echo "<th>Image</th>";
                            echo "<th>Description</th>";
                            echo "<th>Grade (Semester)";
                            echo "<th>Date Added</th>";
                            //NO NEED TO ADD STRANDS ON 'MINOR' AND 'APPLIED SUBJECTS'
                            //ALL 'MINOR' AND 'APPLIED SUBJECTS' IS JIVING ON ALL STRANDS!
                            echo "<th style='display:none;'>Department</th>";
                            echo "<th>Instructor</th>";
                            echo "<th colspan=2>Action</th>";
                        echo "</tr>";
                    while($row = $result->fetch_assoc()) 
						{   
                            echo "<tr bgcolor=white style='text-align:center;'>";
                                echo "<td>" . $row["subj_code"];
                                echo "<td style='width: 10%;'>" . $row["subj_name"];
                                ?>
                                    <td><img src="<?php echo "../imgsubject/".$row['subj_image']; ?>" width='80px' height='80px'></td>
                                <?php
                                echo "<td style='width: 20%;'>" . $row["subj_desc"];
                                echo "<td>" . $row["grade"];
                                echo "<td>" . $row["date_added"];
                                echo "<td style='display:none;'>" . $row["dept"];
                                echo "<td>" . $row["Instructor"];
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
<?php

   if(isset($_POST['add'])) {
        $c_name = $_POST['course_name'];
        $c_code = $_POST['course_code'];
        $c_desc = $_POST['course_desc'];
        $c_dateadd = date("Y-m-d");       
        $c_assign = $_POST['assign'];
        $gradesem = $_POST['gradesem'];
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
			//if(!file_exists($target_dir)){					// Upload file
    			if(move_uploaded_file($tempname,$target_dir)){
    			    $image_base64 = base64_encode(file_get_contents($target_dir) );
                    $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
                                        
                    try {
                        $add = "INSERT INTO subject_tbl (`subj_id`, `subj_name`, `subj_code`, `subj_desc`, `date_added`, `dept`, `grade`, `subj_image`, `Instructor`, `archive`) VALUES ('null','$c_name','$c_code',                                                                 '$c_desc','$c_dateadd','$department','$gradesem','$c_image','$c_assign',0)";
                        if (mysqli_query($conn, $add)) {
                            ?>
                                <script>
                                    alert("New Record Added!");
                                </script>
                            <?php	
                            mysqli_query($conn,"INSERT INTO history_tbl(uName,uType,uAction,timedate) VALUES('$sess_name','$sess_role','Added Subject',NOW())")
					        or die(mysqli_error($conn));
                        } else {
                        echo "Error: " . $add . "<br>" . mysqli_error($conn);
                        }
                    echo "<meta http-equiv='refresh' content='0'>";
                    } catch (mysqli_sql_exception $e) {
                        ?>
                            <script> alert ("Please do not use Apostrophe "); </script>
                        <?php
                        var_dump($e);
                        exit; 
                    }
    			}
			
        }
    }
?>
