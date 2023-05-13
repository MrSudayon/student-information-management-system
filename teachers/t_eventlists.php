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
    <title>Announcement Management</title>
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
    <h2><button class="openbtn" onclick="openNav()">☰</button>&nbsp;&nbsp;Announcement Management</h2>  
    <button class="openbtn1" onclick="openNav1()">☰</button>
    <!-- Contents -->
        <div class="dashb_content"> 
            <hr class="line">       
            <center>

            <div class="news_posting">
                <div class="announcement">
                    <h3> Create Announcement </h3>
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <label for="title">Announcement Title</label><br>
                        <input type="text" name="title" id="title" placeholder="Subject Title" style="padding: 5px 10px;"/><br><br>

                        <label for="desc">Description</label><br>
                        <textarea name="desc" id="desc" style="padding: 15px; height: 50px; width:300px;"></textarea><br><br>

                        <label for="date">Date time</label><br>
                        <input type="date" name="date" id="date" style="padding: 5px 10px;"/>
                        <input type="time" name="time" id="date" style="padding: 5px 10px;"/><br><br>

                        <label for="target">Target</label><br>
                        <select name="target" style="font-family: Consolas; cursor: pointer; padding: 5px 30px; width: 10%;" required>

                        <?php
                            $query = "SELECT DISTINCT section FROM student_tbl";
                            $result = $conn->query($query);
                            if($result->num_rows>0) {
                                $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
                            }
                        ?>
                            <option disabled selected >Select Target</option>
                        <?php
                            foreach($res as $sec):
                        ?>
                            <option value="<?php echo $sec['section']; ?>"><?php echo $sec['section']; ?></option>
                            
                        <?php
                            endforeach;
                        ?>
                        </select><br><br>
                        <input type="submit" class="btn_crt" name="create" value="Create">
                    </form>
                </div>
            </div>
            <?php 
                if(isset($_POST['create'])) {
                    $title = $_POST['title'];
                    $desc = $_POST['desc'];
                    $date = $_POST['date'].' '.$_POST['time'];
                    $target = $_POST['target'];
                    $sql = mysqli_query($conn, "INSERT INTO announcement_tbl (title, description, date, enabled, target) VALUES ('$title', '$desc', '$date', 1, '$target')");
                    
                    ?>
                        <script>
                            alert('Announcement/Event Successfully added!');
                            window.location.href = "t_eventlists.php";
                        </script>
                    <?php

                    $conn -> close();

                }
            ?>

            <br><hr>
            <h3>Announcement Lists</h3><br>
            <table class='course_lists'>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Target</th>
                    <th>Date & Time</th>
                    <th colspan=2>Action</th>
                </tr>

                <?php
                    
                    $sql = mysqli_query($conn, "SELECT * FROM announcement_tbl ORDER BY enabled DESC, date ASC");
                    while($row=mysqli_fetch_array($sql)) {
                        $en = $row['enabled'];
                        if($en == 0) {
                            ?>
                                <tr bgcolor='#ffcccb'>
                            <?php
                        }else {
                            ?>
                                <tr bgcolor=white>
                            <?php
                        }
                ?>

                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['description']; ?> </td>
                    <td><?php echo $row['target']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><a href="t_eventlists.php?action=recover&id=<?php echo $row['id']; ?>" class="btn_add" style="border: 1px black solid; padding:2px 10px; color: black;">Recover</a></td>
                    <td><a href="t_eventlists.php?action=remove&id=<?php echo $row['id']; ?>" class="btn_can" style="border: 1px black solid; padding:2px 10px; color: black;">Remove</a></td>
                </tr>
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

<?php
    $act = @$_GET['action'];
    $aid = @$_GET['id'];
    if($act == 'recover') {
        $sql = "UPDATE announcement_tbl SET enabled='1' WHERE id='$aid'";
    } elseif($act == 'remove') {
        $sql = "UPDATE announcement_tbl SET enabled='0' WHERE id='$aid'";
    }
    $res = $conn->query($sql);
    Header('Location: '.$_SERVER['PHP_SELF']);
    $conn->close();
?>