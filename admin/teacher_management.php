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
    <?php include "./admin_nav.php"; ?>
</div>
<!-- sidebar -->
  
<!-- Main -->
<div id="main">
    <h2><button class="openbtn" onclick="openNav()">☰</button>&nbsp;&nbsp;Instructor Management</h2>  
    <button class="openbtn1" onclick="openNav1()">☰</button>
    <!-- Contents -->
        <div class="dashb_content">
            <hr class="line">       

                <br>
                <center>
                <a name="create" class="btn_crt" href="../actions/tchr_create.php">Create User</a>
                
                <h3>Teachers Lists 
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="text" name="search"/>
                    <button type="submit" name="srch" style="cursor: pointer;">Search</button>
                
                </h3>
                    <table class=course_lists >
                        <tbody>
                        <tr bgcolor=#363636 style='color:white'>
                            <th>Instructor Name</th>
                            <th>Section</th>
                            <th>User</th>
                            <th>Password</th>
                            <th>Phone #</th>
                            <th>Action</th>
                        </tr>

                        <?php 
                           

                            if(isset($_POST['srch'])) {
                                $search = $_POST['search'];
                               

                                $query = mysqli_query($conn, "SELECT * FROM teachers_tbl WHERE tchr_LAST LIKE '%".$search."%' OR tchr_FIRST LIKE '%".$search."%' OR tchr_MID LIKE '%".$search."%' 
                                OR section LIKE '%".$search."%' OR department LIKE '%".$search."%' OR user LIKE '%".$search."%' OR subjects LIKE '%".$search."%'") or die ("Could not search"); 
                                
                            } else {    
                                $query = mysqli_query($conn, "SELECT * FROM teachers_tbl ORDER BY tchr_STATUS ASC");
                            }
                            
                            while ($row = mysqli_fetch_array($query)) {

                                   
                                $status = $row['tchr_STATUS'];
                                if($status=='INACTIVE') {
                                    ?>
                                        <tr bgcolor='#ffcccb'>
                                    <?php
                                }else {
                                    ?>
                                        <tr bgcolor=white>
                                    <?php
                                }
                                
                        ?>
                            <?php echo "<td>" .$row['tchr_LAST'],', ' .$row['tchr_FIRST'],' ' .$row['tchr_MID']; ?>
                            <td><?php echo $row['section']; ?></td>
                            <td><?php echo $row['user']; ?></td>
                            <td><?php echo $row['pass']; ?></td>
                            <td><?php echo $row['tchr_PHONE']; ?></td>
                            <td><a href="../actions/tchr_update.php?id=<?php echo $row['id']; ?>" class="update_btn">UPDATE</a></td>
                        </tr>
                        </form>           
                        <?php 
                        }
                        ?>
                    </table>
                </center>
        </div>
    <!-- Contents -->
</div>
<!-- Main -->

<script src="../sidebar_nav.js"></script>

</body>
</html>