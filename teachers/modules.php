<?php
    include "../php/auth.php";
    include "../php/dbase_config.php";
    

    $sql = "SELECT * FROM tblfiles where status='Published' || status='Unpublished' ORDER BY status ASC, date ASC";
    $result = mysqli_query($conn, $sql);

    $files = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
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
        <title>Modules</title>

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
<!-- Main -->
<div id="main">
    <h2><button class="openbtn" onclick="openNav()">☰</button>&nbsp;&nbsp;Modules</h2>  
    <button class="openbtn1" onclick="openNav1()">☰</button>
    <!-- Contents -->
        <div class="dashb_content">
            <hr class="line">
			<center>
				<form action="upload.php" method="post" enctype="multipart/form-data" >
					    <h3>Upload Files</h3>
                        <input type="file" class="upload" required name="myfile1">
                            <br><br>
                        <label class="weeklbl" for="weektxt1">Description:</label>
                        <input type="text" class="weektxt1" name="weektxt" required placeholder="ex. Week 1">
                            <br><br>
                        <label class="weeklbl" for="stat">Status:</label>
                            <select name="stat" id="stat" required class="status">
                                <option value="Published">Publish</option>
                                <option value="Unpublished">Unpublish</option>
                            </select> &nbsp;&nbsp;
                        <label class="weeklbl" for="sec">Section:</label>
                            <select name="sec" id="sec" required class="status">
                                <!--
                                <option value="ABM"> ABM </option>
                                <option value="STEM"> STEM </option>
                                <option value="HUMSS"> HUMSS </option>
                                <option value="GAS"> GAS </option>
                                <option value="TechVoc"> TechVoc </option>
                                -->
                            <?php
                                $sub = "SELECT DISTINCT section FROM student_tbl";
                                $res1 = mysqli_query($conn, $sub);
                               

                                foreach($res1 as $kape):
                            ?> 
                                <option value="<?php echo $kape['section']; ?>"><?php echo $kape['section']; ?></option>
                            <?
                               endforeach;
                            ?>
                            </select>
                        <br>
                        <button type="submit" name="save" class="btnup">Upload</button>
				</form>
                <br><hr>
                <h3>List of Modules</h3>
                        <table class="t-table">
                        <tbody>
                            <tr>
                                <th>Description</th>
                                <th>Filename</th>
                                <th>Program</th>
                                <th>Date Upload</th>
                                <th>size</th>
                                <th>Status</th>
                                <th colspan="4">Action</th>
                            </tr>
                        <?php foreach ($files as $file): ?>
                            <tr bgcolor="white">
                                <td><?php echo $file['Description']; ?></td>
                                <td><?php echo $file['name']; ?></td>
                                <td><?php echo $file['uploadedto']; ?></td>
                                <td><?php echo $file['date']; ?></td>
                                <td><?php echo floor($file['size'] / 1000) . ' KB'; ?></td>

                                    <?php
                                    if ($file['status']=="Published"){
                                    ?>

                                <td bgcolor="lime"><b><?php echo $file['status']; ?></b></td>

                                    <?php
                                    } elseif($file['status']=="Unpublished"){
                                    ?>

                                <td bgcolor="red"><b><?php echo $file['status']; ?></b></td>

                                    <?php
                                    }
                                    ?>

                                <td><a href="download.php?file_id=<?php echo $file['ID'] ?>"> Download </a> </td>
                                <td><a name="archive" href="archive.php?file_id=<?php echo $file['ID'] ?>"> Delete </a> </td>
                                <td><a href="published.php?file_id=<?php echo $file['ID'] ?>"> Publish </a> </td>
                                <td><a href="unpublished.php?file_id=<?php echo $file['ID'] ?>"> Unpublish </a> </td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                        </table>
            </center>
        </div>
    <!-- Contents -->
</div>
<!-- Main -->
  

<script src="../sidebar_nav.js"></script>

</body>
</html>