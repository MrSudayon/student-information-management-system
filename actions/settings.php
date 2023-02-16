<?php
    require_once "../php/auth.php";
    include "../php/dbase_config.php";
    
    $sql = mysqli_query($conn,"SELECT * FROM user WHERE id = '$sess_id' AND STATUS = 'ACTIVE' ");
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


    <!-- CSS -->
        <style>
            :root {
                --main-color:#35CEFF;
                --dark-color: #11152a;
                --light-color: #d0d4ed;
            }
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Poppins', sans-serif;
            }
            .feedback {
                place-items: center;
                display: grid;
            }
            textarea {
                width: 60%;
                min-height: 20dvh;
                margin-bottom: 2dvh;
            }
            button[type='submit'] {
                background-color: var(--main-color);
                padding: 5px 0;
                width: 50%;
                border: 1px solid black;
                border-radius: 15px;
                cursor: pointer;
                transition: all ease-out .3s;
            }
            button[type='submit']:hover {
                background-color: #ddd;
            }
        </style>
    <!-- CSS -->
    </head>

<body>

<!-- sidebar -->
<div class="side-menu" id="mySidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <div class="smateo-logo">
        <img src="../images/smateo-shs.png" style="width: 70%;">
    </div>
    <ul >
        <a href="../student/account.php"><li><img src="../images/user-icon.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Account</h4></li></a>
        <a href="../student/dashboard.php"><li><img src="../images/dashboard (2).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Dashboard</h4></li></a>
        <a href="../student/subjects.php"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Subjects</h4></li></a> 
        <a href="../student/history.php"><li><img src="../images/settings.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">History</h4></li></a>
        <a href="#"><li><img src="../images/help-web-button.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Help</h4></li></a>
        <a href="../php/logout.php"><li><img src="../images/settings.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Log Out</h4></li></a>
    </ul>
</div>
<!-- sidebar -->

<!-- Main -->
<div id="main">
    <h2><button class="openbtn" onclick="openNav()">☰</button>&nbsp;&nbsp;Settings</h2>
    <button class="openbtn1" onclick="openNav1()">☰</button>
    <!-- Contents -->
    <div class="dashb_content">

        <hr class="line">       
        <h1> Report Bugs </h1>

            <form action="" method="POST">
        <div class="feedback">
            
                <textarea>

                </textarea>
                
                <button type="submit" name="sub"> Submit </button>
        </div>
            </form>
            

    </div>
    <!-- Contents -->
</div>
<!-- Main -->


<script src="../sidebar_nav.js"></script>
</body>
</html>
<?php
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