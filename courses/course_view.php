<?php
    include "../php/dbase_config.php";
    include "../php/auth.php";
    $sess_name = $_SESSION['SESSION_FNAME'];
    
    $id = $_GET['subj_id'];
    $sub_code = $_GET['subj_code'];
    
    $sql = "SELECT * FROM tblfiles WHERE status='Published' AND course_code='$sub_code'";
    $result = mysqli_query($conn, $sql);
    
    $files = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="../images/smateo-shs.png">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/teacher.css">
        <title>Course View</title>
</head>

<body>
    
<!-- sidebar -->
<div class="side-menu" id="mySidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <div class="smateo-logo">
        <img src="../images/smateo-shs.png" style="width: 70%;">
    </div>
    <ul>
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
    <h2><button class="openbtn" onclick="openNav()">☰</button>&nbsp;&nbsp;<?php echo $sub_code; ?></h2>  
    <button class="openbtn1" onclick="openNav1()">☰</button>
    <!-- Contents -->
        <div class="dashb_content">
            <hr class="line">       
            <br>
            <center>
            <h2>List of Modules</h2><br>
				<form action="modules.php" method="post" enctype="multipart/form-data" >
                    <table class="t-table">
                    <tbody>
                        <tr>
                            <th>Description</th>
                            <th>Filename</th>
                            <th>size</th>
                            <th colspan="4">Action</th>
                        </tr>
                    <?php foreach ($files as $file): ?>
                        <tr bgcolor="white">
                            <td><?php echo $file['Description']; ?></td>
                            <td><?php echo $file['name']; ?></td>
                            <td><?php echo floor($file['size'] / 1000) . ' KB'; ?></td>
                            <td><a href="../teachers/download.php?file_id=<?php echo $file['ID']; ?>&name=<?php echo $sess_name; ?>&sub_code=<?php echo $sub_code; ?>"> Download </a> </td>
                        </tr>
                    <?php endforeach;?>

                    </tbody>
                    </table>
                </form>
            </center>
        </div>
    <!-- Contents -->
</div>
<!-- Main -->
  
<script src="../sidebar_nav.js"></script>

</body>
</html>