<?php 
include ("../dbase/db_connect.php");

$subj_code = $_GET ['subj_code'];

try {

    $sql = mysqli_query($conn, "UPDATE subject_tbl SET archive=1 WHERE subj_code = '$subj_code' ");

    header("location:../admin/course_management.php");
    mysqli_free_result($sql);
} catch (mysqli_sql_exception $e) {
    var_dump($e);
    exit;
}
?>