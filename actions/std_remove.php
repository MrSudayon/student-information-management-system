<?php 
    include ("../php/dbase_config.php");

$id = $_GET ['id'];

    $sql = mysqli_query($conn, "UPDATE students_tbl, users
                                INNER JOIN students_tbl S ON S.std_id = users.stud_id
                                SET S.std_STATUS = 'INACTIVE',
                                    users.STATUS = 'INACTIVE'
                                WHERE stud_id='$id'");


    header("location: ../admin/student_management.php");
    mysqli_free_result($sql);

?>