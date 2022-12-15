<?php 
    include ("../php/dbase_config.php");

$LRN = $_GET ['id'];

    $sql = mysqli_query($conn, "UPDATE subject_tbl SET archive=1 WHERE LRN = '$LRN' ");

    header("location: ../admin/student_management.php");
    mysqli_free_result($sql);

?>