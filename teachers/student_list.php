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
    <h2><button class="openbtn" onclick="openNav()">☰</button>&nbsp;&nbsp; List of Students </h2>  
    <button class="openbtn1" onclick="openNav1()">☰</button>
    <!-- Contents -->
    <div class="dashb_content">
        <hr class="line">
        <center>
        <form method="POST" action="student_list.php">
            <?php  

                    $query1 ="SELECT DISTINCT section FROM student_tbl";
                    $result1 = $conn->query($query1);
                    if($result1->num_rows> 0){
                        $options= mysqli_fetch_all($result1, MYSQLI_ASSOC);
                    }
                
                ?>
                <br>
                    <select id="section" name="section" style="font-family: Consolas; cursor: pointer; padding: 5px 10px; width: 40%;">
                        <option>Select Section</option>
                        <?php 
                        foreach ($options as $option) :
                        ?>
                            <option><?php echo $option['section']?> </option>
                        <?php 
                            endforeach;
                        ?>
                    </select>
            <br><br>
            <button type='submit' name='btnFilter' style="cursor: pointer; padding: 5px 50px;">Filter</button>
        </form>
        <table class="course_lists">
        
        <tbody>
            <tr>
            <?php
                if(isset($_POST['btnFilter'])){
                    $selected_sec = $_POST['section'];

                    $sql = "SELECT * FROM student_tbl where section='$selected_sec' order by name";
                    $result = mysqli_query($conn, $sql);
                }
                $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            
            if($selected_sec==null) {
            ?>
                <th colspan=3 style="display: none;"><?php echo $selected_sec; ?></th>
                <tr style="display: none;">
            <?php
            } else {
            ?>


                <th colspan=3><?php echo $selected_sec; ?></th>
            </tr>
            <tr>
                <th>No. of Student</th>
                <th>Student Name</th>
                <th>Gender</th>
            </tr>

            <?php
            }
                $i = 1;
                foreach ($rows as $row): 
            ?>
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