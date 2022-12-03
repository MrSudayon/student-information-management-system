<?php
    
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/admin.css">
        <title>Course Management</title>

</head>

<body>
    
<!-- sidebar -->
<div class="side-menu" id="mySidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <ul>
        <a href="admin_dashboard.html"><li><img src="../images/teacher2.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Teacher Management</h4></li></a>
        <a href="course_management.php"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Course Management</h4></li></a>
        <a href="student_management.html"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Student Management</h4></li></a>
        <a href="#"><li><img src="../images/settings.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">User Settings</h4></li></a>
        <a href="../portal.html"><li><img src="../images/settings.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Log Out</h4></li></a>
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
                <img src="../images/smateo-shs.jpg">
            </div>
            <br><hr class="line">       
            
            
            <div class="add_tbl">
                <div class="head">
                    <p>Add Course</p>
                </div>
                <div class="content">
                    <form method="POST" action="">
                        <table class="add_course">
                            <tr>
                                <th><input type="text" placeholder="Course Code" style="font-family: Consolas; height: 30px;"> </th>
                                <th><input type="text" placeholder="Course Name" style="font-family: Consolas; height: 30px;"> </th>
                                <th><input type="textarea" placeholder="Description" style="font-family: Consolas; height: 30px;"> </th>
                            </tr>
                            <tr>
                                <td>Course Code</td>
                                <td>Course Name</td>
                                <td>Description</td>
                            </tr>
                            <tr>
                                <th><input type="text" placeholder="Units" value="3.0" style="font-family: Consolas; height: 30px;"> </th>
                                <th><input type="text" placeholder="Course Name" style="font-family: Consolas; height: 30px;"> </th>
                                <th><label for="assign"></label>
                                    <select id="assign" name="assign" style="font-family: Consolas; height: 30px; width: 100%;">
                                        <option value="1">Instrucor 1</option>
                                        <option value="2">Instrucor 2</option>
                                        <option value="3">Instrucor 3</option>
                                    </select>
                                </th>
                            </tr>
                            <tr>
                                <td>Unit</td>
                                <td>Course Grade</td>
                                <td>Assign to:</td>
                            </tr>
                            <tr>
                                <th colspan=3><button type="submit" class="btn_add">ADD</button></th>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            
            <br>
            <hr class="line">       
            <h3>Course Lists</h3>
            <?php
                $sel = "SELECT * FROM user AS u 
                INNER JOIN cart AS c 
                ON (u.EMP_ID = c.C_ID) 
                WHERE status='Waiting for Approval'";
                $result = $conn->query($sel);

                if ($result->num_rows > 0) 
                    {
                        echo "<table class=course_lists>";
                            echo "<tr>";
                                echo "<th>Course Name</th>";
                                echo "<th>Course Code</th>";
                                echo "<th>Description</th>";
                                echo "<th>Units</th>";
                                echo "<th>Course Grade</th>";
                                echo "<th>Assign/Action</th>";
                                echo "<th>Course Key-Code</th>";
                            echo "</tr>";

                            echo "<tr>";
                                echo "<td>Android Development with Android Studio</td>";
                                echo "<td>ITEL 420</td>";
                                echo "<td style=width: 30%;>Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                                    <br>Sint optio ea ducimus voluptate, fuga consectetur dolores! 
                                    <br>Perferendis sequi facilis eveniet accusamus, nobis 
                                    <br>praesentium aut provident odit incidunt explicabo inventore 
                                    <br>necessitatibus.</td>";
                                echo "<td>3.0</td>";
                                echo "<td>Grade 12</td>";
                                echo "<td>//button assign to instructor or section?</td>";
                                echo "<td>**generate code</td>";
                            echo "</tr>";
                        echo "</table>";
                    }
                    } else {
                                        
                        echo "<CENTER><p  style='color:red' font-size='3em'>0 results</p></CENTER>";
                                    
                    }
                
                            $conn->close();
            ?>
                
        </div>
    <!-- Contents -->
</div>
<!-- Main -->
  





  
<script src="../sidebar_nav.js"></script>

</body>
</html>