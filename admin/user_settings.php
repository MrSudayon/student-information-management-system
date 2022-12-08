<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/admin.css">
        <title>Student Management</title>

</head>

<body>
    
<!-- sidebar -->
<div class="side-menu" id="mySidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <ul>
        <a href="admin_dashboard.php"><li><img src="../images/dashboard (2).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Dashboard</h4></li></a>
        <a href="teacher_management.php"><li><img src="../images/teacher2.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Teacher Management</h4></li></a>
        <a href="course_management.php"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Course Management</h4></li></a>
        <a href="student_management.php"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Student Management</h4></li></a>
        <a href="user_settings.php"><li><img src="../images/settings.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">User Settings</h4></li></a>
        <a href="../index.html"><li><img src="../images/settings.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Log Out</h4></li></a>
    </ul>
</div>
<!-- sidebar -->
  
<!-- Main -->
<div id="main">
    <h2><button class="openbtn" onclick="openNav()">☰</button>&nbsp;&nbsp;User Priveleges</h2>  
    <button class="openbtn1" onclick="openNav1()">☰</button>
    <!-- Contents -->
        <div class="dashb_content">
            <br><hr class="line">       
            <br>
            <!-- CRUD -->
            <!-- Create User for Admin or Instructor -->
            <table>
                <tr>
                    <th>Name</th>
                    <th>DoB</th>
                    <th>Priveleges</th>
                    <th>Active</th>
                </tr>
                <tr>
                    <td>Roy Magnifico</td>
                    <td>05/00/2000</td>
                    <td>Student</td>
                    <td>1</td>
                </tr>
            </table>
        </div>
    <!-- Contents -->
</div>
<!-- Main -->
  





  
<script src="../sidebar_nav.js"></script>

</body>
</html>