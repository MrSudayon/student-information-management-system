<?php
            // connect to the database
    include "../php/dbase_config.php";
            // Uploads files
             // if save button on the form is clicked
        $id = $_GET['file_id']; // get id through query string
        $del = "UPDATE tblfiles SET status='Unpublished' where ID = '$id'"; // delete query
        $conn->query($del);
        mysqli_close($conn); // Close connection
        header("Refresh:0; url=../teachers/modules.php"); // redirects to all records page
?>