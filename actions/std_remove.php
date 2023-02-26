<?php 
    include ("../php/dbase_config.php");

$id = $_GET ['id'];

    $sql = mysqli_query($conn, "UPDATE student_tbl SET enabled=0 WHERE id='$id'");

    header("location: ../admin/student_management.php");
    mysqli_free_result($sql);

?>