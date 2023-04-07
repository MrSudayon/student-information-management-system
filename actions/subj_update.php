<?php 
include "../php/dbase_config.php";
require_once "../php/auth.php";


$id = "";
$sub_code = "";
$sub_name = "";
$sub_desc = "";
$sub_unit = "";
$sub_prof = "";
$dept = "";

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
            $sub_prof = $row['Instructor'];
            $dept = $row['dept'];
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
        <a href="../admin/admin_dashboard.php"><li><img src="../images/dashboard (2).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Dashboard</h4></li></a>
        <a href="../admin/admin_dashboard.php"><li><img src="../images/teacher2.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Teacher Management</h4></li></a>
        <a href="../admin/course_management.php"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Subject Management</h4></li></a>
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
                <img src="../images/smateo-shs.png">
            </div>
            <br><hr class="line">       
            
            
            <div class="add_tbl">
                <h3>Update Subject</h3>
                <div class="content">
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype='multipart/form-data'> 
                        <table class="add_course">
                            <tr>
                                <th colspan=3><input type="hidden" name="sub_id" value="<?php echo $id; ?>" style="font-family: Consolas; height: 30px;"></th>
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
                                <td><input type="text" name="department" placeholder="Department" style="font-family: Consolas; height: 30px;" value="<?php echo $dept; ?>" > </th>
                                 
                                <td>
                                    <?php  
                                        $query ="SELECT tchr_LAST,tchr_FIRST,tchr_MID FROM teachers_tbl";
                                        $result = $conn->query($query);
                                        if($result->num_rows> 0){
                                            $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
                                        }
                                    ?>
                                    <select id="assign" name="assign" style="font-family: Consolas; height: 30px; width: 100%;">
                                        <option><?php echo $options['tchr_FIRST']; ?></option>
                                        <?php 
                                        foreach ($options as $option) {
                                        ?>
                                            <option><?php echo $option['tchr_FIRST'].", ".$option['tchr_MID'].". ".$option['tchr_LAST']; ?> </option>
                                        <?php 
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Department</td>
                                <td>Assigned to:</td>
                            </tr>

                            <tr>
                                <th colspan=3><button type="submit" name="upd" class="btn_add">UPDATE</button></th>
                            </tr>
                            <tr>
                                <th colspan=3><button type="submit" name="can" class="btn_can">BACK</button></th>
                            </tr>
                        </table>
                    </form>
                    

                    <?php            

                        $sub_code = '';
                        $sub_name = '';
                        $sub_desc = '';
                        $sub_unit = '';
                        $sub_prof = '';
                        $dept = '';

                        if(isset($_POST['upd'])) {
                            $c_id = $_POST['sub_id'];
                            $c_name = $_POST['course_name'];
                            $c_code = $_POST['course_code'];
                            $c_desc = $_POST['course_desc'];
                            $c_assign = $_POST['assign'];
                            $department = $_POST['department'];
                            

                            try {
                                $upd = "UPDATE subject_tbl SET subj_name = '$c_name', subj_code = '$c_code', subj_desc = '$c_desc', Instructor = '$c_assign', dept = '$department' WHERE subj_id = '$c_id' AND archive = 0";
                            
                                if(mysqli_query($conn, $upd)){
                                ?>
                                    <script>
                                        alert("Record Updated!");
                                        window.location.href = "../admin/course_management.php";
                                    </script>
                                <?php
                                mysqli_query($conn,"INSERT INTO history_tbl(uName,uType,uAction,timedate) VALUES('$sess_name','$sess_role','Added Subject',NOW())")
					            or die(mysqli_error($conn));

                                } else {
                                    echo "Error: " . $add . "<br>" . mysqli_error($conn);
                                }
                                    
                            } catch (mysqli_sql_exception $e) {
                                var_dump($e);
                                exit;
                            }
                        }
                        elseif(isset($_POST['can'])) {
                            ?>
                                <script>
                                    window.location.href = "../admin/course_management.php";
                                </script>
                            <?php
                            $conn -> close();
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