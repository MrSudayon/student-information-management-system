<?php
    require_once "../php/auth.php";
    include "../php/dbase_config.php";
    
    $sql = mysqli_query($conn,"SELECT * FROM student_tbl WHERE id = '$sess_id' AND enabled = 1 ");
    $row = mysqli_fetch_assoc($sql);
            
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
        <a href="subjects.php"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Subjects</h4></li></a> 
        <a href="history.php"><li><img src="../images/settings.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">History</h4></li></a>
        <a href="#"><li><img src="../images/help-web-button.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Help</h4></li></a>
        <a href="../php/logout.php"><li><img src="../images/settings.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Log Out</h4></li></a>
    </ul>
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
                        <h5><?php echo $row['user']; ?></h5>
                    </div>
                    </center>
                </div>
                
                <div class="acc-settings">
                    <a href="../actions/view_grades.php?id=<?php echo ($row['id']); ?>&name=<?php echo ($row['name']); ?>"><li><h4>View Grades</h4></li></a>
                    <a href="../actions/settings.php"><li><h4>Settings</h4></li></a>
                    <a href="../php/logout.php"><li><h4>Logout</h4></li></a>
                </div>
            </div>
            
            <div class="right-pane">
                <div class="right-content">
                    <hr><h3><div class="right-title"><img src="../images/personal-info.png" style="height: 19px;"> Personal Information:</div></h3><br>
                
                <form method="POST" action="account.php">
                <table class="student_info">    
                    <tr>
                        <th colspan=4 style="text-align: left;"></th>
                    </tr>
                    <tr>
                        <td><h4>Strand:</td>
                        <td colspan="3"><input type="text" class="rc-text" value="STEM" name="dept" contenteditable style="border: 1px solid black; border-radius: 5px; padding: 5px; background-color: #e6ffdb; border-style: dotted; cursor: default; text-align: center;"></h4></td>

                    </tr>

                    </tr>
                        <td><h4>LRN:</td>
                        <td colspan="3"><input type="text" class="rc-text" value="<?php echo $row['LRN']; ?>" readonly style="border: 1px solid black; border-radius: 5px; padding: 5px; background-color: #e6ffdb; border-style: dotted; cursor: default; text-align: center;"></h4></td>
                    <tr>

                    <tr>
                        <td><h4>Grade:</h4></td>
                        <td colspan="3"><input type="text" class="rc-text" value="12" readonly style="border: 1px solid black; border-radius: 5px; padding: 5px; background-color: #e6ffdb; border-style: dotted; cursor: default; text-align: center;"></td>
                    </tr>

                    </tr>

                    <tr>
                        <td><h4>Name: </h4></td>
                        <td colspan=2><center><input type="text" class="rc-text" value="<?php echo $sess_name; ?>" readonly style="border: 1px solid black; border-radius: 5px; padding: 5px; background-color: #e6ffdb; border-style: dotted; cursor: default; text-align: center;"></center></td>
                        
                    </tr>
    
                    <tr>
                        <td style="width: 18%"></td>
                        <td colspan=2 style="text-align: center;"><h5>Full Name</h5></td>
                    </tr>

                    <tr>
                        
                        <td><h4>Date of Birth:</td>
                        <td colspan="3"><input type="date" class="rc-text" name="dob" value="<?php echo $row['dob']; ?>" contenteditable style="border: 1px solid black; border-radius: 5px; padding: 5px; text-align: center; "></td>
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


<script src="../sidebar_nav.js"></script>
</body>
</html>
<?php
  

    $LRN = $row['LRN'];
    if(isset($_POST['sub'])) {
        $dob = date($_POST['dob']);
        $addr = $_POST['address'];
        $phone = $_POST['phone'];
        $suffix = $_POST['suffix'];
        $dept = $_POST['dept'];
        
    
                    
        $sql = "INSERT INTO students_tbl (id,LRN,std_LAST,std_FIRST,std_MID,std_SUFFIX,std_EMAIL,std_DOB,std_PHONE,Department,Grade,Section,Address,std_STATUS) 
                VALUES (null, '$LRN','$sess_lname', '$sess_name', '$sess_mid', '$suffix', '$email', '$dob', '$phone', '$dept', '12', '3','$addr','ACTIVE')";

        
        if(mysqli_query($conn, $sql)) {
            ?>
                <script>
                    window.location.href = "../student/account.php";
                    alert("Record Updated!");
                </script>
            <?php
            mysqli_query($conn,"INSERT INTO history_tbl(uName,uType,uAction,timedate)
                                VALUES ('$sess_name', 'UPDATED PERSONAL INFORMATION',NOW()") or die(mysqli_error($conn));
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