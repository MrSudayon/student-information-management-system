<?php 
    include ("../php/dbase_config.php");

$subj_code = $_GET ['subj_code'];

try {

    $sql = mysqli_query($conn, "UPDATE subject_tbl SET archive=1 WHERE subj_code = '$subj_code' ");

    header("location: A-web-and-android-based-management-information-system-for-Senior-HS-main/admin/course_management.php");
    mysqli_free_result($sql);
} catch (mysqli_sql_exception $e) {
    var_dump($e);
    exit;
}
?>