<?php
    include "../php/dbase_config.php";
    require_once "../php/auth.php";
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
    <ul >
        <a href="account.php"><li><img src="../images/user-icon.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Account</h4></li></a>
        <a href="dashboard.php"><li><img src="../images/dashboard (2).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Dashboard</h4></li></a>
        <a href="subjects.php"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Subjects</h4></li></a> <!--Modules?-->
        <a href="history.php"><li><img src="../images/settings.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">History</h4></li></a>
        <a href="#"><li><img src="../images/help-web-button.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Help</h4></li></a>
    </ul>
</div>
<!-- sidebar -->

<!-- Main -->
<div id="main">
    <h2><button class="openbtn" onclick="openNav()">☰</button>&nbsp;&nbsp;Accounts</h2>
    <button class="openbtn1" onclick="openNav1()">☰</button>
    <!-- Contents -->
    <div class="dashb_content">

        <hr class="line">       
        <h1> Account Settings </h1>
        <div class="profile">
                <?php
                    $sql = mysqli_query($conn,"SELECT * FROM users WHERE id = '$sess_id' AND STATUS = 'ACTIVE' ");
                    $row=mysqli_fetch_assoc($sql);
                ?>
            <div class="left-pane">
                <div class="profile-icon">
                    <center>
                    <img src="../images/user.png">
                    <div class="usern">
                        <h1><?php echo strtoupper($sess_lname);?>, <?php echo ucfirst($sess_name); ?> <?php echo ucfirst($sess_mid);?>.</h1>
                        <h5><?php echo $row['EMAIL']; ?></h5>
                    </div>
                    </center>
                </div>
                
                <div class="acc-settings">
                    <a href="../actions/view_grades.php?id=<?php echo ($row['id']); ?>&name=<?php echo ($row['FIRST']); ?>"><li><h4>View Grades</h4></li></a>
                    <a href="#"><li><h4>Edit Profile</h4></li></a>
                    <a href="#"><li><h4>Settings</h4></li></a>
                    <a href="../php/logout.php"><li><h4>Logout</h4></li></a>
                </div>
                
            </div>

            <?php
                $stud_id = $row['stud_id'];
                   
                $sql1 = mysqli_query($conn,"SELECT * FROM students_tbl WHERE std_id = '$stud_id' AND std_STATUS = 'ACTIVE' ");
                $row1 = mysqli_fetch_array($sql1);
            ?>

            <div class="right-pane">
                <div class="right-content">
                    <hr><h3><div class="right-title"><img src="../images/personal-info.png" style="height: 19px;"> Personal Information:</div></h3><br>
                
                <form method="POST" action="account.php">
                <table class="student_info">    
                    <tr>
                        <th colspan=4 style="text-align: left;"></th>
                    </tr>
                    <tr>
                        <td><h4>Program:</td>
                        <td colspan="3"><input type="text" class="rc-text" value="STEM" contenteditable style="border: 1px solid black; border-radius: 5px; padding: 5px; background-color: #e6ffdb; border-style: dotted; cursor: default; text-align: center;"></h4></td>

                    </tr>

                    </tr>
                        <td><h4>Student ID:</td>
                        <td colspan="3"><input type="text" class="rc-text" value="<?php echo $row['LRN']; ?>" readonly style="border: 1px solid black; border-radius: 5px; padding: 5px; background-color: #e6ffdb; border-style: dotted; cursor: default; text-align: center;"></h4></td>
                    <tr>

                    <tr>
                        <td><h4>Grade:</h4></td>
                        <td colspan="3"><input type="text" class="rc-text" value="12" readonly style="border: 1px solid black; border-radius: 5px; padding: 5px; background-color: #e6ffdb; border-style: dotted; cursor: default; text-align: center;"></td>
                    </tr>

                    </tr>

                    <tr>
                        <td><h4>Name: </h4></td>
                        <td><center><input type="text" class="rc-text" value="<?php echo $sess_lname; ?>" readonly style="border: 1px solid black; border-radius: 5px; padding: 5px; background-color: #e6ffdb; border-style: dotted; cursor: default; text-align: center;"></center></td>
                        <td><center><input type="text" class="rc-text" value="<?php echo $sess_name;?>" readonly style="border: 1px solid black; border-radius: 5px; padding: 5px; background-color: #e6ffdb; border-style: dotted; cursor: default; text-align: center;"></center></td>                   
                    </tr>
    
                    <tr>
                        <td style="width: 18%"></td>
                        <td style="text-align: center;"><h5>Last Name</h5></td>
                        <td style="text-align: center;"><h5>First Name</h5></td>
                    </tr>
                    
                    <tr>
                        <td></td>
                        <td><center><input type="text" class="rc-text" value="<?php echo $sess_mid;?>" readonly style="border: 1px solid black; border-radius: 5px; padding: 5px; background-color: #e6ffdb; border-style: dotted; cursor: default; text-align: center;"></center></h4></td>
                        <td><center><input type="text" class="rc-text" name="suffix" value="<?php echo $row1['std_SUFFIX'];?>" contenteditable placeholder="ex. Jr, Sr, I, II..." style="border: 1px solid black; border-radius: 5px; padding: 5px; text-align: center; width: 50%;"></center></h4></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td style="text-align: center;"><h5>Middle Name</h5></td>
                        <td style="text-align: center;"><h5>Suffix</h5></td>
                    </tr>

                    <tr>
                        
                        <td><h4>Date of Birth:</td>
                        <td colspan="3"><input type="date" class="rc-text" name="dob" value="<?php echo $row1['std_DOB']; ?>" contenteditable style="border: 1px solid black; border-radius: 5px; padding: 5px; text-align: center; "></td>
                    </tr>
                        
                    <tr>
                        <td><h4>Address:</h4></td>
                        <td colspan="3"><input type="text" class="rc-text" name="address" value="<?php echo $row1['Address']; ?>" contenteditable style="border: 1px solid black; border-radius: 5px; padding: 5px; text-align: center; "></td>
                    </tr>

                    <tr>
                        <td><h4>Contact no:</h4></td>
                        <td colspan="3"><input type="text" class="rc-text" name="phone" value="<?php echo $row1['std_PHONE']; ?>" contenteditable style="border: 1px solid black; border-radius: 5px; padding: 5px; text-align: center; "></td>
                    </tr>        
                    
                    <tr>
                        <td></td>
                        <td colspan=3><button type="submit" name="sub">Apply</button></td>
                </table>    
                </form>
                </div>
            </div>
        </div>
        
    </div>
    <!-- Contents -->
</div>
<!-- Main -->

<?php
    $LRN = $row['LRN'];
    if(isset($_POST['sub'])) {
        $dob = date($_POST['dob']);
        $addr = $_POST['address'];
        $phone = $_POST['phone'];
        $suffix = $_POST['suffix'];

        $sql = "UPDATE students_tbl SET std_DOB='$dob', Address='$addr', std_PHONE='$phone', std_SUFFIX='$suffix' WHERE LRN = '$LRN'";
        
        if(mysqli_query($conn, $sql)) {
            ?>
                <script>
                    window.location.href = "../student/account.php";
                    alert("Record Updated!");
                </script>
            <?php
            mysqli_query($conn,"INSERT INTO history_tbl(std_id,std_no,std_Action,timedate)
                                SELECT std_id, '$LRN', 'UPDATED PERSONAL INFORMATION',NOW()
                                FROM students_tbl") or die(mysqli_error($conn));
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

<script src="../sidebar_nav.js"></script>
</body>
</html>