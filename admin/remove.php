<?php 
    include ("../php/dbase_config.php");

    $subj_id = $_GET ['id'];

    $del = "UPDATE subject_tbl SET archive=1 WHERE subj_id = '$subj_id' "; // delete query
    $conn->query($del);
        header("Refresh:0; url=../admin/course_management.php"); // redirects to all records page
?>