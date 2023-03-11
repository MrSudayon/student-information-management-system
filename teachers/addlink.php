<?php
// connect to the database
require_once "../php/auth.php";
include ("../php/dbase_config.php");
// Uploads files
if (isset($_POST['addbut'])) { // if save button on the form is clicked
    // name of the uploaded file
    
    $desc = $_POST['descript'];
    $link = $_POST['link'];
    $scode = $_POST['subj'];

    $sql = "INSERT INTO tbllinks (ID,description,links,uploadedto) VALUES (NULL,'$desc','$link','$scode')";
    if (mysqli_query($conn, $sql)) {
        ?>
        
            <script>
                alert("Link Added successfully");
                window.location = "../teachers/links.php";
            </script>	
        <?php
        mysqli_query($conn,"INSERT INTO history_tbl(uName, uType, uAction, timedate) VALUES ('$sess_name', '$sess_role', 'Added a Link URL',NOW())")or die(mysqli_error($conn));
    } else {
        echo "Failed to add link.";
        echo"<script> window.history.back(); </script>";
    }
    $conn->close();
}
?>
                    