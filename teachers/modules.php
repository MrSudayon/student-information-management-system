<?php
    include "../teachers/upload.php";
    include "../php/dbase_config.php";

    $sql = "SELECT * FROM tblfiles where status='Published' || status='Unpublished'";
    $result = mysqli_query($conn, $sql);


    $files = mysqli_fetch_all($result, MYSQLI_ASSOC);


    if (isset($_GET['file_id'])) {
        $id = $_GET['file_id'];

        // fetch file to download from database
        $sql = "SELECT * FROM tblfiles WHERE id=$id";
        $result = mysqli_query($conn, $sql);

        $file = mysqli_fetch_assoc($result);
        $filepath = '../uploads/modules/' . $file['name'];

        if (file_exists($filepath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($filepath));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize('uploads/modules/' . $file['name']));
            readfile('uploads/modules/' . $file['name']);

            // Now update downloads count
            $newCount = $file['downloads'] + 1;
            $updateQuery = "UPDATE tblfiles SET downloads=$newCount WHERE id=$id";
            mysqli_query($conn, $updateQuery);
            exit;
        }

    }
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
    <ul>
        <a href="tchr_dashboard.php"><li><img src="../images/dashboard (2).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Dashboard</h4></li></a>
        <a href="tchr_attendance.php"><li><img src="../images/teacher2.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Attendance</h4></li></a>
        <a href="modules.php"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Modules</h4></li></a>
        <a href="#"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">List of Sections</h4></li></a>
        <a href="#"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">List of Students</h4></li></a>
        <a href="#"><li><img src="../images/reading-book (1).png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Grades of Students</h4></li></a>
        <a href="../portal.html"><li><img src="../images/settings.png" alt="">&nbsp;&nbsp;&nbsp; <h4 class="menu-text">Log Out</h4></li></a>
    </ul>
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
            <br>
			<center>
				<form action="modules.php" method="post" enctype="multipart/form-data" >
				    <div class="dashb_content1">
					    <br><h3 class="hlbl">Upload Files</h3><br>
                            <input type="file" class="txtcode1" required name="myfile1"><br>

                        <label class="weeklbl">Description:</label><input type="text" class="weektxt" name="weektxt" required placeholder="ex. Week 1">
                        <label class="weeklbl">Status:</label>
                            <select name="stat" id="stat" required class="weektxt">
                                <option value="Published">Publish</option>
                                <option value="Unpublished">Unpublish</option>
                            </select>
                        <button type="submit" name="save" class="btnup">Upload</button>
				    </div>
				</form>
                <br><hr class="line">
                <br>  <h3>List of Modules</h3>
				<form action="modules.php" method="post" enctype="multipart/form-data" >
                    <div class="dashb_content2">
                        <table class="modulestbl">
                        <thead class="tbhead">
                            <tr>
                                <th>Description</th>
                                <th>Filename</th>
                                <th>size</th>
                                <th>Status</th>
                                <th colspan="4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($files as $file): ?>
                            <tr class="trdata">
                                <td><?php echo $file['Description']; ?></td>
                                <td><?php echo $file['name']; ?></td>
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

                                <td><a href="modules.php?file_id=<?php echo $file['ID'] ?>"> Download </a> </td>
                                <td><a name="archive" href="archive.php?file_id=<?php echo $file['ID'] ?>"> Delete </a> </td>
                                <td><a href="published.php?file_id=<?php echo $file['ID'] ?>"> Publish </a> </td>
                                <td><a href="unpublished.php?file_id=<?php echo $file['ID'] ?>"> Unpublish </a> </td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                        </table>
                    </div>
                </form>
            </center>
        </div>
    <!-- Contents -->
</div>
<!-- Main -->
  

<script src="../sidebar_nav.js"></script>

</body>
</html>