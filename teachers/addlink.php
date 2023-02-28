<?php
// connect to the database
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
    } else {
        echo "Failed to add link.";
        echo"<script> window.history.back(); </script>";
    }
    $conn->close();
}
?>
                    