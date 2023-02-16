<?php 
include "../php/dbase_config.php";
require_once "../php/auth.php";


$id = "";
$section = "";
$pass = "";
$phone = "";
$status = "";
$subjects = "";

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    }
        $sql = "SELECT * FROM teachers_tbl WHERE id = '$id' ";
        $res = $conn->query($sql);

        if ($res->num_rows > 0) 
        {
            $row = mysqli_fetch_array($res);

            $id = $row['id'];
            $lname = $row['tchr_LAST'];
            $fname = $row['tchr_FIRST'];
            $mn = $row['tchr_MID'];
            $department = $row['department'];
            $section = $row['section'];
            $user = $row['t_user'];
            $pass = $row['pass'];
            $phone = $row['tchr_PHONE'];
            $subjects = $row['subjects'];
            $status = $row['tchr_STATUS'];
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
        <title>Instructor Management</title>

</head>

<body>
    
<!-- sidebar -->
<div class="side-menu" id="mySidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <ul>
        <a href="../admin/admin_dashboard.php"><li><img src="../images/dashboard (2).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Dashboard</h4></li></a>
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
                <img src="../images/smateo-shs.png">
            </div>
            <br><hr class="line">       
            
            
            <div class="add_tbl">
                <h3>Update Course</h3>
                <div class="content">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
         
                        <table class="add_course">
                            
                            <tr>
                                <th colspan=2><input type="text" name="name" value="<?php echo $lname,', ',$fname,' ',$mn; ?>" style="font-family: Consolas; height: 30px; min-width: 100%;" require> </th>
                                <th><input type="text" name="department" value="<?php echo $department; ?>" style="font-family: Consolas; height: 30px; min-width: 100%;" require> </th>
                            </tr>
                            <tr>
                                <td colspan=2>Teachers Name</td>
                                <td>Strand/Department</td>
                            </tr>
                            <tr>
                                <th><input type="text" name="section" value="<?php echo $section; ?>" style="font-family: Consolas; height: 30px;" require> </th>
                                <th><input type="text" name="user" value="<?php echo $user; ?>" style="background-color: #ddd; font-family: Consolas; height: 30px;" readonly> </th>
                                <th><input type="text" name="pass" value="<?php echo $pass; ?>" style="font-family: Consolas; height: 30px;" require> </th>
                            </tr>
                            <tr>
                                <td>Section</td>
                                <td colspan=2>Account</td>
                            </tr>
                            <tr>
                                <th colspan=2><input type="text" name="phone" value="<?php echo $phone; ?>" style="font-family: Consolas; height: 30px; min-width: 100%;" require> </th>
                                <th><select id="status" name="status" style="font-family: Consolas; height: 30px; width: 100%;">
                                        <option value="INACTIVE">INACTIVE</option>
                                        <option value="ACTIVE">ACTIVE</option>
                                    </select>
                                </th>
                            </tr>
                            <tr>
                                <td colspan=2>Phone</td>
                                <td>Set STATUS</td>
                            </tr>
                            <tr>
                                <th colspan=2><select multiple id="subjects" onclick="myFunction()" name="subjects" style="font-family: Consolas; height: 50px; width: 100%;">
                                        <option value="Subject 1">sub 1</option>
                                        <option value="Subject 2">sub 2</option>
                                        <option value="Subject 3">sub 3</option>
                                    </select>
                                    
                                </th>
                                <th>
                                    <p id="x"></p>
                                </th>
                                <script>
                                    function myFunction() {
                                        var x = document.getElementById("subjects").value;
                                        document.getElementById("x").innerHTML = x; 
                                    }
                                </script>
                            </tr>
                            <tr>
                                <td colspan=3>Subjects</td>
                            </tr>
                            <tr>
                                <th colspan=3><input type="submit" name="update" class="btn_add" value="Update"></th>
                            </tr>
                            <tr>
                                <th colspan=3><input type="submit" name="cancel" class="btn_can" value="Cancel"></th>    
                            </tr>
                        </table>
                    </form>

                    <?php            

                        $section = '';
                        $pass = '';
                        $phone = '';
                        $subjects = '';
                        $status = '';

                        if(isset($_POST['update'])) {
                            $section = $_POST['section'];
                            $pass = $_POST['pass'];
                            $phone = $_POST['phone'];
                            $status = $_POST['status'];
                            $subjects = $_POST['subjects'];
                            
                            
                            
                                try {
                                    $upd = "UPDATE teachers_tbl SET section = '$section', pass = '$pass', tchr_PHONE = '$phone', subjects = '$subjects', tchr_STATUS = '$status' WHERE id = '$id'";
                                    $conn->query($upd);

                                    ?>
                                        <script>
                                            window.location.href = "../admin/teacher_management.php";
                                            alert("Record Updated!");
                                        </script>
                                    <?php
                                    if($status == 'ACTIVE') {

                                        mysqli_query($conn, "INSERT INTO user(user,pass,type,status)
                                                    SELECT t_user, pass, role, tchr_STATUS
                                                    FROM teachers_tbl");

                                    } else {
                                    $conn -> close();
                                    }
                                } catch (mysqli_sql_exception $e) {
                                    var_dump($e);
                                    exit;
                                }
                                        
                            
                        }
                        elseif(isset($_POST['cancel'])) {
                            ?>
                                <script>
                                    window.location.href = "../admin/teacher_management.php";
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