<?php 
include "../dbase/db_connect.php";

$id = "";
$sub_code = "";
$sub_name = "";
$sub_desc = "";
$sub_unit = "";
$sub_prof = "";
$dept = "";
$sub_img = "";

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sub_code = $_GET['subj_code'];
    }
        $sql = "SELECT * FROM subject_tbl WHERE subj_id = '$id' ";
        $res = $conn->query($sql);

        if ($res->num_rows > 0) 
        {
            $row = mysqli_fetch_array($res);

            $id = $row['subj_id'];
            $sub_code = $row['subj_code'];
            $sub_name = $row['subj_name'];
            $sub_desc = $row['subj_desc'];
            $sub_unit = $row['unit'];
            $sub_prof = $row['assignedto'];
            $dept = $row['dept'];
        }
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/admin.css">
        <title>Course Management</title>

</head>

<body>
    
<!-- sidebar -->
<div class="side-menu" id="mySidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <ul>
        <a href="../admin/admin_dashboard.php"><li><img src="../images/teacher2.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Teacher Management</h4></li></a>
        <a href="../admin/course_management.php"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Course Management</h4></li></a>
        <a href="../admin/student_management.php"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Student Management</h4></li></a>
        <a href="#"><li><img src="../images/settings.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">User Settings</h4></li></a>
        <a href="../index.php"><li><img src="../images/settings.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Log Out</h4></li></a>
    </ul>
</div>
<!-- sidebar -->

<!-- Main -->
<div id="main">
    <h2><button class="openbtn" onclick="openNav()">☰</button>&nbsp;&nbsp;Course Management</h2>  
    <button class="openbtn1" onclick="openNav1()">☰</button>
    <!-- Contents -->
        <div class="dashb_content">
            <div class="smateo-logo">
                <img src="../images/smateo-shs.jpg">
            </div>
            <br><hr class="line">       
            
            
            <div class="add_tbl">
                <h3>Add Course</h3>
                <div class="content">
                    <form method="POST" action="../actions/update.php" enctype='multipart/form-data'> 
                        <table class="add_course">
                            <tr>
                                <th colspan=3><input type="text" name="sub_id" value="<?php echo $id; echo $sub_code; ?>" style="font-family: Consolas; height: 30px;"></th>
                            </tr>
                            <tr>
                                <th><input type="text" name="course_code" placeholder="Course Code" style="font-family: Consolas; height: 30px;" value="<?php echo $sub_code; ?>" > </th>
                                <th><input type="text" name="course_name" placeholder="Course Name" style="font-family: Consolas; height: 30px;" value="<?php echo $sub_name; ?>" > </th>
                                <th><input type="textarea" name="course_desc" placeholder="Description" style="font-family: Consolas; height: 30px;" value="<?php echo $sub_desc; ?>" > </th>
                            </tr>
                            <tr>
                                <td>Course Code</td>
                                <td>Course Name</td>
                                <td>Description</td>
                            </tr>
                            <tr>
                                <th><input type="text" name="course_unit" placeholder="Units" value="<?php echo $sub_unit; ?>" style="font-family: Consolas; height: 30px;"> </th>
                                <th><input type="text" name="department" placeholder="Department" style="font-family: Consolas; height: 30px;" value="<?php echo $dept; ?>" > </th>
                                <th><label for="assign" ></label>
                                    <select id="assign" name="assign" style="font-family: Consolas; height: 30px; width: 100%;" >
                                        <option value="<?php echo $sub_prof; ?>"><?php echo $sub_prof; ?></option>
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
                                <th colspan=3><button type="submit" name="upd" class="btn_add">UPDATE</button></th>
                            </tr>
                        </table>
                    </form>

                    <?php            

                        if(isset($_POST['upd'])) {
                            $c_id = $_POST['sub_id'];
                            $c_name = $_POST['course_name'];
                            $c_code = $_POST['course_code'];
                            $c_desc = $_POST['course_desc'];
                            $c_unit = $_POST['course_unit'];      
                            $c_assign = $_POST['assign'];
                            $department = $_POST['department'];
                            

                            try {
                                $upd = "UPDATE subject_tbl SET subj_name = '$c_name', subj_code = '$c_code', subj_desc = '$c_desc', unit = '$c_unit', 
                                                            assignedto = '$c_assign', dept = '$department' WHERE subj_id = '$id' AND archive = 0 ";
                                $conn->query($upd);


                                ?>
                                    <script>
                                        window.location.href = "../admin/course_management.php";
                                        alert("Record Updated!");
                                    </script>
                                <?php
                            } catch (mysqli_sql_exception $e) {
                                var_dump($e);
                                exit;
                            }
                        }
                    
                    ?>
                </div>
            </div>
            

       
                
        </div>
    <!-- Contents -->
</div>
<!-- Main -->
  





  
<script src="../sidebar_nav.js"></script>

</body>
</html>