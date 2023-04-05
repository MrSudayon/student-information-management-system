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
            $user = $row['user'];
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
    <div class="smateo-logo">
        <img src="../images/smateo-shs.png" style="width: 70%;">
    </div>
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
    <h2><button class="openbtn" onclick="openNav()">☰</button>&nbsp;&nbsp;Instructor Management</h2>  
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
                                <th colspan=2><input type="text" name="name" value="<?php echo $lname,', ',$fname,' ',$mn; ?>" style="font-family: Consolas; height: 30px; min-width: 100%;" > </th>
                                <th><input type="text" name="department" value="<?php echo $department; ?>" style="font-family: Consolas; height: 30px; min-width: 100%;" > </th>
                            </tr>
                            <tr>
                                <td colspan=2>Teachers Name</td>
                                <td>Strand/Department</td>
                            </tr>
                            <tr>
                                <th><input type="text" name="section" value="<?php echo $section; ?>" style="font-family: Consolas; height: 30px;" > </th>
                                <th><input type="text" name="user" value="<?php echo $user; ?>" style="background-color: #ddd; font-family: Consolas; height: 30px;" readonly> </th>
                                <th><input type="text" name="pass" value="<?php echo $pass; ?>" style="font-family: Consolas; height: 30px;" > </th>
                            </tr>
                            <tr>
                                <td>Section</td>
                                <td colspan=2>Account</td>
                            </tr>
                            <tr>
                                <th colspan=2><input type="text" name="phone" value="<?php echo $phone; ?>" style="font-family: Consolas; height: 30px; min-width: 100%;" require> </th>
                                <th><select id="status" name="t_status" class="status" style="font-family: Consolas; height: 30px; width: 100%;">
                                        <option value="<?php echo $status; ?>"> </option>
                                        <option value="INACTIVE">INACTIVEs</option>
                                        <option value="ACTIVE">ACTIVEs</option>
                                    </select>
                                </th>
                                <th>
                                    <input type="hidden" id="tchr_status" name="t_status"/>
                                </th>
                            </tr>
                            
                            <tr>
                                <td colspan=2>Phone</td>
                                <td>Set STATUS</td>
                            </tr>
                            <tr>
                                <td colspan=2>
                                    <?php  
                                    $query ="SELECT * FROM subject_tbl WHERE Instructor LIKE  '%".$lname."%' ";
                                    $result = $conn->query($query);
                                    
                                    if($result->num_rows> 0){
                            
                                        $subjects = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                    }

                                    ?>
                                    <div class="multi-selector">

                                        <div class="select-field">
                                            <input type="text" placeholder="choose subjects" id="" class="input-select" style="outline: none; border: none;"/>
                                            <span class="arrow-down">&blacktriangledown;</span>
                                        </div>
                                        
                                        <div class="list">
                                            <?php
                                            foreach ($subjects as $subject) {
                                            ?>

                                            <label class="task">
                                            <input type="checkbox" class="subjs" name="<?php echo $subject['subj_code']; ?>" id="<?php echo $subject['subj_code']; ?>" value="<?php echo $subject['subj_code']; ?>" >
                                                <?php echo $subject['subj_name']; ?>
                                                <span><?php echo $subject['subj_code']; ?></span>
                                            </input>
                                            </label>
                                                
                                            <?php 
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </td>
                                <td colspan=2>
                                    <input type="hidden" name="selectedSub" id="selectedSub"/>
                                    <p id="subs">  </p>
                                </td>
                            
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

                </div>
            </div>
            

       
                
        </div>
    <!-- Contents -->
</div>
<!-- Main -->
  
<script src="../sidebar_nav.js"></script>
<script>
    //Status Update
    
    const selectStatus = document.getElementById('status');
    var valHolder = document.getElementById('tchr_status');

    function onChange() {
        var selVal = selectStatus.options[selectStatus.selectedIndex].value;
        var selText = selectStatus.options[selectStatus.selectedIndex].text;

        valHolder.value = selVal;
        console.log(selVal, selText);
    }
    selectStatus.onchange = onChange;
    onChange();
    
    
    // getting checked value from array
    var sub = document.querySelectorAll('input[type=checkbox]');
    var paraSelectedElement = document.getElementById('subs');  
    const selectedInput = document.getElementById('selectedSub');
                            
    sub.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            const selectedSub = [];
            
            sub.forEach(function(checkbox) {
                if(checkbox.checked) {
                    selectedSub.push(checkbox.value);
                    //selectedInput.value = JSON.stringify(selectedSub);
                    selectedInput.value = selectedSub.join(","); 
                }
            });
                
        paraSelectedElement.innerHTML = selectedSub;
        console.log(selectedSub);
        console.log(selectedInput);
        });
    });
    
</script>
<script>
    document.querySelector('.select-field').addEventListener('click',()=>{
    document.querySelector('.list').classList.toggle('show');
    });
</script>
</body>
</html>
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
        $status = $_POST['t_status'];
        $subjects = $_POST['subjects'];

        try {
            $upd = mysqli_query($conn,"UPDATE teachers_tbl SET section = '$section', pass = '$pass', tchr_PHONE = '$phone', subjects = '$subjects', tchr_STATUS = '$status' WHERE id = '$id'");

            ?>
                <script>
                    alert("Record Updated!");
                    window.location.href = "../admin/teacher_management.php";
                </script>
            <?php
            

        } catch (mysqli_sql_exception $e) {
            var_dump($e);
            exit;
        }

    } elseif(isset($_POST['cancel'])) {
        ?>
            <script>
                window.location.href = "../admin/teacher_management.php";
            </script>
        <?php
    }
    $conn->close();
?>