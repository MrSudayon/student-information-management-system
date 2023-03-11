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
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/teacher.css">
        <link rel="icon" href="../images/smateo-shs.png">
       
        <title>Student List</title>
        <script src="../sidebar_nav.js"></script>
</head>

<body>
    
<!-- sidebar -->
<div class="side-menu" id="mySidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <div class="smateo-logo">
        <img src="../images/smateo-shs.png" style="width: 70%;">
    </div>
    <?php include "./teacher_nav.php"; ?>
</div>
<!-- sidebar -->
  
<!-- Main -->
<div id="main">
    <h2><button class="openbtn" onclick="openNav()">☰</button>&nbsp;&nbsp;Student in <?php //echo $sec; ?> </h2>  
    <button class="openbtn1" onclick="openNav1()">☰</button>
    <!-- Contents -->
    <div class="dashb_content">
        <hr class="line">
        <center>
        <h3>List of Students</h3>
        <form method="POST" action="student_list.php">
            <table>
                <tbody>
                    <tr>
                        <th>
                            <?php  
                                $query ="SELECT section FROM teachers_tbl where id='$sess_id'";
                                $result = $conn->query($query);
                                if($result->num_rows> 0){
                                    $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
                                }
                                ?>
                                    <select id="section" name="section" style="font-family: Consolas; height: 30px; width: 100%;">
                                        <option>Select Section</option>
                                        <?php 
                                        foreach ($options as $option) {
                                        ?>
                                            <option><?php echo $option['section']?> </option>
                                        <?php 
                                            }
                                        ?>
                                    </select>
                        </th>
                        <th>
                            <button type='submit' name='btnFilter'>Filter</button>
                        </th> 
                    </tr>
                </tbody>
            </table>
        </form>
        <br>
        <hr class="line"><br>
            <table class="t-table">
            <tbody>
                <tr>
                    <th>No. of Student</th>
                    <th>Student Name</th>
                    <th>Gender</th>
                </tr>
                    <?php
                        if(isset($_POST['btnFilter'])){
                            $selected_sec = $_POST['section'];

                            $sql = "SELECT * FROM student_tbl where section='$selected_sec' order by name";
                            $result = mysqli_query($conn, $sql);
                        }
                        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    $i = 1;
                    foreach ($rows as $row): ?>
                <tr bgcolor="white">

                    <td><?php echo $i;  ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                </tr>

                    <?php $i++; 
                    
                    endforeach;?>
            </tbody>
            </table>
        </center>
    </form>
    </div>
    <!-- Contents -->
</div>
<!-- Main -->

  

</body>
</html>



