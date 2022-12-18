<?php
	$servername="localhost";
	$username="id19986764_root";
	$password="bd5Bj{tsiqF+>V*d";
	$dbase="id19986764_caps_db";

	$conn=mysqli_connect($servername,$username,$password,$dbase);

    if($conn->connect_error){
      die("Error in DB connection: ".$conn->connect_errno." : ".$conn->connect_error);    
    }

?>