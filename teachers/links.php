<?php
    include "../php/dbase_config.php";
    require_once "../php/auth.php";
    
    $sql = "SELECT * FROM tbllinks";
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
       
        <title>Links</title>
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
    <h2><button class="openbtn" onclick="openNav()">☰</button>&nbsp;&nbsp;Link Manager</h2>  
    <button class="openbtn1" onclick="openNav1()">☰</button>
    <!-- Contents -->
    <div class="dashb_content">
        <hr class="line">

        <center>
            <form action="addlink.php" method="post" enctype="multipart/form-data">
                <h3>Add Links</h3>
                <label class="weeklbl">Description:</label>
                <input type="text" class="weektxt1" name="descript" required placeholder="Description"/>
                    <br><br>
                <label class="weeklbl">Link:</label>
                <input type="text" class="weektxt1" name="link" required placeholder="paste link here"/>&nbsp;&nbsp;
                <label class="weeklbl" for="subj">Status:</label>
                            <select name="subj" id="subj" required class="status">
                                <option value="FIL111">FILP</option>
                                <option value="WATP">WATP</option>
                            </select>
                    <br>
                <input type="submit" class="btnup" name="addbut" value="Add">
            </form>
        
        <hr>
        <h3>List of Links</h3>
            <table class="t-table">
            <tbody>
                <tr>
                    <th>Description</th>
                    <th>Link</th>
                    <th>Uploaded to</th>
                </tr>

                    <?php foreach ($files as $file): ?>
                <tr bgcolor="white">
                    <td><?php echo $file['description']; ?></td>
                    <td><a href="<?php echo $file['links']; ?>" target="_blank"><?php echo $file['links']; ?></a></td>
                    <td><?php echo $file['uploadedto']; ?></td>
                </tr>
                    <?php endforeach;?>
            </tbody>
            </table>
        </center>
    </div>
    <!-- Contents -->
</div>
<!-- Main -->

  

</body>
</html>