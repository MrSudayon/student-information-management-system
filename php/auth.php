<?php
//before we store information of our member, we need to start first the session
session_start();
//create a new function to check if the session variable member_id is on set
	if($_SESSION['SESSION_ID']) {
		$sess_id = $_SESSION['SESSION_ID'];
		$sess_name = $_SESSION['SESSION_FNAME'];
		$sess_lname = $_SESSION['SESSION_LNAME'];
		$sess_mid = $_SESSION['SESSION_MID'];
	} else {
		header("refresh:0;url= ../index.html");
		?>
			<script>
				alert('Login first!')
			</script>
		<?php
	}
		

?>