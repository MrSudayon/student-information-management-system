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
        <a href="../admin/teacher_management.php"><li><img src="../images/teacher2.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Teacher Management</h4></li></a>
        <a href="../admin/course_management.php"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Subject Management</h4></li></a>
        <a href="../admin/student_management.php"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Student Management</h4></li></a>
        <a href="../admin/user_settings.php"><li><img src="../images/settings.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">User Settings</h4></li></a>
        <a href="../php/logout.php"><li><img src="../images/settings.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Log Out</h4></li></a>
    </ul>
</div>
<!-- sidebar -->
  
<!-- Main -->
<div id="main">
    <h2><button class="openbtn" onclick="openNav()">☰</button>&nbsp;&nbsp;Instructor Management</h2>  
    <button class="openbtn1" onclick="openNav1()">☰</button>
    <!-- Contents -->
        <div class="dashb_content">
        <hr class='line'>
        <div class="add_tbl">
            <h3>Create Instructor</h3>
            <div class="content">
                <form id="form" action="tchr_create.php" method="POST" enctype="multipart/form-data">
        
                    <table class="add_course">
                        
                        <tr>
                            <th><input type="text" name="lname" placeholder="Last Name" style="font-family: Consolas; height: 30px;" require> </th>
                            <th><input type="text" name="fname" placeholder="First Name" style="font-family: Consolas; height: 30px;" require> </th>
                            <th><input type="text" name="m" placeholder="Mid" style="font-family: Consolas; height: 30px;" require> </th>
                        </tr>
                        <tr>
                            <td colspan=3>Teachers Name</td>
                        </tr>
                        <tr>
                            <th colspan=2><input type="text" name="department" placeholder="Strand/Department" style="font-family: Consolas; height: 30px; min-width: 100%;" require> </th>
                            <th><input type="text" name="section" placeholder="Section" style="font-family: Consolas; height: 30px;" require> </th>
                        </tr>
                        <tr>
                            <td colspan=2>Strand/Department</td>
                            <td>Section</td>
                        </tr>
                        <tr>
                            <th><input type="text" name="user" placeholder="User" style="font-family: Consolas; height: 30px;" require> </th>
                            <th><input type="text" name="pass" placeholder="pass" style="font-family: Consolas; height: 30px;" require> </th>
                            <th><input type="text" name="phone" placeholder="Phone" style="font-family: Consolas; height: 30px;" require> </th>
                        </tr>
                        <tr>
                            <td colspan=2>User</td>
                            <td>Phone</td>
                        </tr>
                        <tr>
                            <td>
                                    <?php  
                                    $query ="SELECT * FROM subject_tbl";
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
                                <input type="hidden" name="selectedSub" id="val"/>
                                <p id="subs">  </p>
                            </td>

                            <script>
                                // getting checked value from array
                                var sub = document.querySelectorAll('input[type=checkbox]');
                                var paraSelectedElement = document.getElementById('subs');                        

                                sub.forEach(function(checkbox) {
                                    checkbox.addEventListener('change', function() {
                                        const selectedSub = [];
                                        
                                        sub.forEach(function(checkbox) {
                                            if(checkbox.checked) {
                                                selectedSub.push(checkbox.value);
                                            }
                                        });
                                            
                                    paraSelectedElement.innerHTML = selectedSub;
                                    document.getElementById("val").value = selectedSub;

                                    console.log(selectedSub);

                                    });
                                });
                            </script>
                           
                        </tr>
    
                        <tr>
                        <?php echo $selSub; ?>
                            <th colspan=3><input type="submit" name="add" class="btn_add" value="Create User"></th>
                        </tr>
                        <tr>
                            <th colspan=3><input type="submit" name="can" class="btn_can" value="Back"></th>
                        </tr>
                    </table>
                
                </form>
            </div>
        </div>

        
        <script src="../sidebar_nav.js"></script>
        <script>
                document.querySelector('.select-field').addEventListener('click',()=>{
                document.querySelector('.list').classList.toggle('show');
            });
        </script>
</body>
</html>

<?php
    if(isset($_POST['add'])) {
        $lname = $_POST['lname'];
        $fname = $_POST['fname'];
        $mn = $_POST['m'];
        $dept = $_POST['department'];
        $section = $_POST['section'];
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $phone = $_POST['phone'];

        $subjectss = $_POST['selectedSub'];
        $selSub = implode(" ",$subjectss);

        $name = $_POST['fname'].' '.$_POST['lname'];

        $teachers = mysqli_query($conn, "INSERT INTO teachers_tbl VALUES('', '$lname', '$fname', '$mn', '$section', '$selSub', '$dept', '$phone', '$user', '$pass', 'INACTIVE')");
        $audit = mysqli_query($conn, "INSERT INTO audit_logs VALUES ('', '$sess_name', 'Admin', 'Added a teacher account', NOW())");
        ?>
            <script>
                alert("New Record Added!");
                window.location.href = "../admin/teacher_management.php";
            </script>
        <?php	
    }
    elseif(isset($_POST['can'])) {
        ?>
            <script>
                window.location.href = "../admin/teacher_management.php";
            </script>
        <?php
        
    }
    $conn -> close();
?>