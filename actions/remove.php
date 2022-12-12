<?php 
include "../php/dbase_config.php";

$subj_code = $_GET ['id'];

    $sql = mysqli_query($conn, "UPDATE subject_tbl SET archive=1 WHERE subj_code = '$subj_code' ");

    header("location: ../admin/course_management.php");
    mysqli_free_result($sql);

?>