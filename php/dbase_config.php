<?php
	$servername="localhost";
	$username="root";
	$password="";
	$dbase="caps_db";

	$conn=mysqli_connect($servername,$username,$password,$dbase);

    if($conn->connect_error){
      die("Error in DB connection: ".$conn->connect_errno." : ".$conn->connect_error);    
    }

?>