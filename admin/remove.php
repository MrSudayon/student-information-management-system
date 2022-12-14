<?php 
    include ("../php/dbase_config.php");

$subj_code = $_GET ['id'];

     $del = "UPDATE subject_tbl SET archive=1 WHERE subj_code = '$subj_code' "; // delete query
    $conn->query($del);
        header("Refresh:0; url=../admin/course_management.php"); // redirects to all records page
?>