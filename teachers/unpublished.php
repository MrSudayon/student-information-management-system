<?php
            // connect to the database
    include ("../php/dbase_config.php");
    require_once "../php/auth.php";
            // Uploads files
        $id = $_GET['file_id']; // get id through query string
        $del = "UPDATE tblfiles SET status='Unpublished' where ID = '$id'"; // delete query
        $conn->query($del);
        mysqli_query($conn,"INSERT INTO history_tbl(uName, uType, uAction, timedate) VALUES ('$sess_name', '$sess_role', 'Unpublished a Module File',NOW())")or die(mysqli_error($conn));
        mysqli_close($conn); // Close connection
        header("Refresh:0; url=../teachers/modules.php"); // redirects to all records page
?>