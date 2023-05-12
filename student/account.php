<?php
    require_once "../php/auth.php";
    include "../php/dbase_config.php";
    
    $sql = mysqli_query($conn,"SELECT * FROM student_tbl WHERE id = '$sess_id' AND enabled = 1 ");
    $row = mysqli_fetch_assoc($sql);         
    $LRN = $row['LRN'];

    $guardian = mysqli_query($conn,"SELECT * FROM guardian_tbl WHERE std_lrn='$LRN'");
    $grow = mysqli_fetch_assoc($guardian);
    $glrn = $grow['std_lrn'];
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="icon" href="../images/smateo-shs.png">
        <title>User Profile</title>
    </head>

<body>

<!-- sidebar -->
<div class="side-menu" id="mySidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <div class="smateo-logo">
        <img src="../images/smateo-shs.png" style="width: 70%;">
    </div>
    <?php include "./student_nav.php"; ?>
</div>
<!-- sidebar -->

<!-- Main -->
<div id="main">
    <h2><button class="openbtn" onclick="openNav()">☰</button>&nbsp;&nbsp;Account Settings</h2>
    <button class="openbtn1" onclick="openNav1()">☰</button>
    <!-- Contents -->
    <div class="dashb_content">

        <hr class="line">       
        <div class="profile">
                
            <div class="left-pane">
                <div class="profile-icon">
                    <center>
                    <img src="../images/user.png">
                    <div class="usern">
                        <h1><?php echo ucfirst($sess_name); ?></h1>
                        <h5><?php echo $sess_user; ?></h5>
                    </div>
                    </center>
                </div>
                
                <div class="acc-settings">
                    <a href="../actions/view_grades.php?id=<?php echo ($row['id']); ?>&name=<?php echo ($row['name']); ?>"><li><h4>View Grades</h4></li></a>
                    <a href="../actions/report.php?id = <?php echo $sess_id; ?>"><li><h4>Report Bugs</h4></li></a>
                    <a href="../php/logout.php"><li><h4>Logout</h4></li></a>
                </div>
            </div>
            
            <div class="right-pane">
                <div class="right-content">
                <hr>
                <h3><div class="right-title"><img src="../images/personal-info.png" style="height: 19px;"> Personal Information:            </div></h3>
                <h1 style= "font-weight:100; font-family: 'Courier Sans'">Learners Information:</h1>
                <form method="POST" action="account.php">
                <table class="student_info">    
                
                    <tr>
                        <th colspan=4 style="text-align: left;"></th>
                    </tr>
                    <tr>
                        <td><h4>Strand:</td>
                        <td colspan="3"><input type="text" class="rc-text" value="<?php echo $row['strand']; ?>" name="dept" readonly style="border: 1px solid black; border-radius: 5px; padding: 5px; background-color: #e6ffdb; border-style: dotted; cursor: default; text-align: center;"></h4></td>

                    </tr>

                    </tr>
                        <td><h4>LRN:</td>
                        <td colspan="3"><input type="text" class="rc-text" value="<?php echo $LRN; ?>" readonly style="border: 1px solid black; border-radius: 5px; padding: 5px; background-color: #e6ffdb; border-style: dotted; cursor: default; text-align: center;"></h4></td>
                    <tr>

                    <tr>
                        <td><h4>Grade:</h4></td>
                        <td colspan="3"><input type="text" class="rc-text" value="<?php echo $row['grade'] ?>" readonly style="border: 1px solid black; border-radius: 5px; padding: 5px; background-color: #e6ffdb; border-style: dotted; cursor: default; text-align: center;"></td>
                    </tr>

                    </tr>

                    <tr>
                        <td><h4>Name: </h4></td>
                        <td colspan=2><center><input type="text" class="rc-text" value="<?php echo $row['name'] ?>" readonly style="border: 1px solid black; border-radius: 5px; padding: 5px; background-color: #e6ffdb; border-style: dotted; cursor: default; text-align: center;"></center></td>
                        
                    </tr>
    
                    <tr>
                        <td style="width: 18%"></td>
                        <td colspan=2 style="text-align: center;"><h5>Full Name</h5></td>
                    </tr>

                    <tr>
                        
                        <td><h4>Date of Birth:</td>
                        <td colspan="3"><input type="date" class="rc-text" name="dob" value="<?php echo $row['dob']; ?>" readonly style="border: 1px solid black; border-radius: 5px; padding: 5px; background-color: #e6ffdb; border-style: dotted; cursor: default; text-align: center;"></td>
                    </tr>
                        
                    <tr>
                        <td><h4>Address:</h4></td>
                        <td colspan="3"><input type="text" class="rc-text" name="address" value="<?php echo $row['address']; ?>" contenteditable style="border: 1px solid black; border-radius: 5px; padding: 5px; text-align: center; "></td>
                    </tr>

                    <tr>
                        <td><h4>Contact no:</h4></td>
                        <td colspan="3"><input type="text" class="rc-text" name="phone" value="<?php echo $row['phone']; ?>" contenteditable style="border: 1px solid black; border-radius: 5px; padding: 5px; text-align: center; "></td>
                    </tr> 
                    <tr>
                        <td style="width: 18%"></td>
                        <td colspan=2 style="text-align: center;"><h5>SMSHS Portal Acccount</h5></td>
                    </tr>
                    <tr>
                        <td><h4>Username: </h4></td>
                        <td colspan="3"><input type="text" class="rc-text" readonly value="<?php echo $row['user']; ?>" contenteditable style="border: 1px solid black; border-radius: 5px; padding: 5px; background-color: #e6ffdb; border-style: dotted; cursor: default; text-align: center; "></td>        
                    </tr>
                    <tr>
                    <td><h4>Password: </h4></td>
                        <td colspan="3"><input type="password" class="rc-text" name="newpass" value="<?php echo $row['pass']; ?>" contenteditable style="border: 1px solid black; width: 100%; border-radius: 5px; padding: 5px; text-align: center; "></td>        
                    </tr>


                    <!-- Parents and Guardian -->
                    <tr>
                        <td colspan=3><h1 style= "font-weight:100; font-family: 'Courier Sans'"><br>Parent's/Guardian Details</h1></td>
                    </tr>


                    <tr>
                        <td><h4>Mother's Name:</h4></td>
                        <td colspan=3><input type="text" name="m_name" class="rc-text" value="<?php echo $grow['m_name']; ?>" style="border: 1px solid black; border-radius: 5px; padding: 5px; text-align: center; "></td>
                    </tr>

                    <tr>
                        <td><h4>Contact no:</h4></td>
                        <td colspan="3"><input type="text" name="m_contact" class="rc-text" value="<?php echo $grow['m_contact']; ?>" style="border: 1px solid black; border-radius: 5px; padding: 5px; text-align: center; "></td>
                    </tr> 

                    <tr>
                        <td><h4>Father's Name:</h4></td>
                        <td colspan=3><input type="text" name="f_name" class="rc-text" value="<?php echo $grow['f_name']; ?>" style="border: 1px solid black; border-radius: 5px; padding: 5px; text-align: center; "></td>
                    </tr>

                    <tr>
                        <td><h4>Contact no:</h4></td>
                        <td colspan="3"><input type="text" name="f_contact" class="rc-text" value="<?php echo $grow['f_contact']; ?>" style="border: 1px solid black; border-radius: 5px; padding: 5px; text-align: center; "></td>
                    </tr> 

                    <tr>
                        <td><h4>Guardian's Name:</h4></td>
                        <td colspan=3><input type="text" name="g_name" class="rc-text" value="<?php echo $grow['g_name']; ?>" style="border: 1px solid black; border-radius: 5px; padding: 5px; text-align: center; "></td>
                    </tr>

                    <tr>
                        <td><h4>Contact no:</h4></td>
                        <td colspan="3"><input type="text" name="g_contact" class="rc-text" value="<?php echo $grow['g_contact']; ?>" style="border: 1px solid black; border-radius: 5px; padding: 5px; text-align: center; "></td>
                    </tr> 

                    <tr>
                        <td><h4>Address Name:</h4></td>
                        <td colspan=3><input type="text" name="g_address" class="rc-text" value="<?php echo $grow['address']; ?>" style="border: 1px solid black; border-radius: 5px; padding: 5px; text-align: center; "></td>
                    </tr>

                     <tr>
                        <td></td>
                        <td colspan=3><button type="submit" name="sub">Apply</button></td>
                    </tr>

                </table>

                </form>
                </div>
            </div>
        </div>
        
    </div>
    <!-- Contents -->
</div>
<!-- Main -->


<script src="../sidebar_nav.js"></script>
</body>
</html>
<?php
    $sql = mysqli_query($conn,"SELECT * FROM student_tbl WHERE id = '$sess_id' AND enabled = 1 ");
    $row = mysqli_fetch_assoc($sql);         
    $LRN = $row['LRN'];

    $guardian = mysqli_query($conn,"SELECT * FROM guardian_tbl WHERE std_lrn='$LRN'");
    $grow = mysqli_fetch_assoc($guardian);
    $glrn = $grow['std_lrn'];
    
    if(isset($_POST['sub'])) {
        $addr = $_POST['address'];
        $phone = $_POST['phone'];
        $dob = date($_POST['dob']);
        $newpass = $_POST['newpass'];
        
        //parent/guardian no.
        $mom_name = $_POST['m_name'];
        $mom_phone = $_POST['m_contact'];
        $dad_name = $_POST['f_name'];
        $dad_phone = $_POST['f_contact'];
        $g_name = $_POST['g_name'];
        $g_phone = $_POST['g_contact'];
        $g_address = $_POST['g_address'];
                    
        $sql = "UPDATE student_tbl SET address = '$addr', phone = '$phone', dob = '$dob', pass = '$newpass' WHERE id = $sess_id ";
        
        //$sqlG = 
        if($glrn == $LRN) {
            mysqli_query($conn,"UPDATE guardian_tbl SET m_name='$mom_name', m_contact='$mom_phone',f_name='$dad_name',f_contact='$dad_phone',g_name='$g_name',g_contact='$g_phone',address='$g_address' WHERE std_lrn='$LRN'");
        } else {
            mysqli_query($conn,"INSERT INTO guardian_tbl (std_lrn,m_name,m_contact,f_name,f_contact,g_name,g_contact,address) VALUES ('$LRN','$mom_name','$mom_phone','$dad_name','$dad_phone','$g_name','$g_phone','$g_address')")
            or die(mysqli_error($conn));
        }
        if(mysqli_query($conn, $sql)) {
            ?>
                <script>
                    alert("Record Updated!");
                </script>
            <?php
            mysqli_query($conn,"INSERT INTO history_tbl(uName,uType,uAction,timedate)
                                VALUES ('$sess_name','$sess_role','Updated Personal Information',NOW())") or die(mysqli_error($conn));
            echo "<meta http-equiv='refresh' content='0'>";
            $conn->close();
        } else {
            ?>
                <script>
                    alert("<?php  echo "Error: " . $sql . "<br>" . mysqli_error($conn); ?>")
                </script>
            <?php
        }
        $conn->close();
    }
?>