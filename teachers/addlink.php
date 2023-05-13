<?php
// connect to the database
include ("../php/dbase_config.php");
require_once "../php/auth.php";

// Uploads files
if (isset($_POST['addbut'])) { // if save button on the form is clicked
    // name of the uploaded file
    
    $desc = $_POST['descript'];
    $link = $_POST['link'];

    $sql = "INSERT INTO tbllinks (ID,description,links) VALUES (NULL,'$desc','$link')";
    if (mysqli_query($conn, $sql)) {
        ?>
        
            <script>
                alert("Link Added successfully");
                window.location = "../teachers/links.php";
            </script>	
        <?php
        mysqli_query($conn,"INSERT INTO history_tbl(uName, uType, uAction, timedate) VALUES ('$sess_name', 'Teacher', 'Added a Link URL',NOW())")or die(mysqli_error($conn));
    } else {
        echo "Failed to add link.";
        echo"<script> window.history.back(); </script>";
    }
    $conn->close();
}
?>
                    