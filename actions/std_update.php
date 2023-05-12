<?php 
include '../php/dbase_config.php';
require_once "../php/auth.php";

$id='';
$name = '';
$user = '';
$grade = '';
$section = '';
$strand = '';
$gender = '';
$address = '';
$en = '';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
} 
    $sql = "SELECT * FROM student_tbl WHERE id = '$id'";
    $res = $conn->query($sql);

if($res->num_rows>0) {
    $row=mysqli_fetch_array($res);
    $name = $row['name'];
    $user = $row['user'];
    $passw = $row['pass'];
    $grade = $row['grade'];
    $section = $row['section'];
    $strand = $row['strand'];
    $dob = $row['dob'];
    $gender = $row['gender'];
    $address = $row['address'];
    $en = $row['enabled'];
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
        <title>Student Management</title>
    </head>
    <body>
        <div class="side-menu" id="mySidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
            <div class="smateo-logo">
                <img src="../images/smateo-shs.png" style="width: 70%;">
            </div>
             <?php include "admin_nav.php"; ?>
        </div>
        <div id="main">
                <h2><button class="openbtn" onclick="openNav()">☰</button>&nbsp;&nbsp;Student Management</h2>  
                <button class="openbtn1" onclick="openNav1()">☰</button>
                    <!-- Contents -->
                <div class="dashb_content">
                        <hr class="line">     
                        <br>
                    <div class="add_tbl">
                    <h3>Update Student</h3>
                    <form method='POST' action='<?php $_SERVER['PHP_SELF']; ?>'>
                    <center>
                        <table class="add_course">
                            <tr>    
                                <td><input type="text" name="namest" value="<?php echo $name; ?>" readonly  style="font-family: Consolas; height: 30px;""/> </td>
                                <td><input type="text" name="user" value="<?php echo $user; ?>" style="font-family: Consolas; height: 30px;"/> </td>
                                <td><input type="text" name="passw" value="<?php echo $passw; ?>" style="font-family: Consolas; height: 30px;"/> </td>
                                <td><input type="text" name="grade" value="<?php echo $grade; ?>" readonly  style="font-family: Consolas; height: 30px;""/> </td>
                                <td><input type="text" name="section" value="<?php echo $section; ?>" style="font-family: Consolas; height: 30px;"/> </td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>User</td>
                                <td>Password</td>
                                <td>Grade</td>
                                <td>Section</td>
                            </tr>

                            <tr>
                                <td><input type="text" name="strand" value="<?php echo $strand; ?>" style="font-family: Consolas; height: 30px;"/> </td>
                                <td><input type="date" name="dob" value="<?php echo $dob; ?>" style="font-family: Consolas; height: 30px;"/> </td>
                                <td><input type="text" name="gender" value="<?php echo $gender; ?>" style="font-family: Consolas; height: 30px;"/> </td>
                                <td><input type="text" name="address" value="<?php echo $address; ?>" style="font-family: Consolas; height: 30px;"/> </td>
                                <!--<td><input type="text" name="enabled" value="<?php echo $en; ?>" style="font-family: Consolas; height: 30px;"/> </td>-->
                                <td>
                                    <select id="status" class="status" style="font-family: Consolas; height: 30px; width: 100%;">
                                        <option value="<?php echo $en; ?>">Student STATUS</option>
                                        <option value="0">DISABLE</option>
                                        <option value="1">ENABLE</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="hidden" id="std_status" name="s_status"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Strand</td>
                                <td>Date of Birth</td>
                                <td>Gender</td>
                                <td>Address</td>
                                <td>Enabled</td>
                            </tr>
                            <tr>
                                <th colspan=5><input type="submit" name="confirm" class="update_btn" value="UPDATE" /></th>
                            </tr>
                            <tr>
                                <th colspan=5><a href="../admin/student_management.php" class="delete_btn">CANCEL</a></th>
                            </tr>
                        </table>
                    </form>
                    </div>
                </div>
        </div>

  
<script src="../sidebar_nav.js"></script>
<script>
    //Status Update
    
    const selectStatus = document.getElementById('status');
    var valHolder = document.getElementById('std_status');

    function onChange() {
        var selVal = selectStatus.options[selectStatus.selectedIndex].value;
        var selText = selectStatus.options[selectStatus.selectedIndex].text;

        valHolder.value = selVal;
        console.log(selVal, selText);
    }
    selectStatus.onchange = onChange;
    onChange();
</script>

</body>
</html>
<?php
if(isset($_POST['confirm'])){

    $id=$_GET['id'];
    $grade=$_POST['grade'];
    $name=$_POST['namest'];
    $user=$_POST['user'];
    $pass=$_POST['passw'];
    $section=$_POST['section'];
    $strand=$_POST['strand'];
    $dob = $_POST['dob'];
    $gender=$_POST['gender'];
    $add=$_POST['address'];
    $stat=$_POST['s_status'];

    $sql="UPDATE student_tbl SET name='$name',grade='$grade',section='$section',strand='$strand',dob='$dob',gender='$gender',address='$add',user='$user',pass='$pass',enabled='$stat'
    WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        ?>
            <script> 
                alert('Updated Successfully') 
                window.location.href = "../admin/student_management.php";
            </script>
        <?php
        
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

?>