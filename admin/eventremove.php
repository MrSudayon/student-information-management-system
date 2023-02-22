<?php 
    include ("../php/dbase_config.php");

    $id = $_GET ['id'];

    $sql = mysqli_query($conn, "UPDATE announcement_tbl SET archive=0 WHERE id='$id'");


    header("location: eventlists.php");
    mysqli_free_result($sql);

?>