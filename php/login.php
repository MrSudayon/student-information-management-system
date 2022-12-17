<?php
    require "../php/dbase_config.php";

    
    if(isset($_POST['loginbut'])){
    	session_start();

		$usern = $_POST['uemail'];
		$password = $_POST['upass'];
		
		$qry =  mysqli_query($conn, "SELECT * FROM users WHERE EMAIL='$usern' AND PASS='$password'");
		$result = mysqli_fetch_array($qry);
		
        $id = $result['id'];
		$stat = $result['STATUS'];
		$type = $result['RoleType'];
		$name = $result['FIRST'];
        $lname = $result['LAST'];
        $mid = $result['MID'];

		$counter = mysqli_num_rows($qry);
         
		if($counter > 0) {   
            $_SESSION['SESSION_ID'] = $id;
			$_SESSION['SESSION_FNAME'] = $name;
            $_SESSION['SESSION_LNAME'] = $lname;
            $_SESSION['SESSION_MID'] = $mid;
			date_default_timezone_set('Asia/Manila');
			$date = date('Y-m-d');
			$time = date('H:i:s');
            
            if($counter== true && $type=="1" && $stat=="ACTIVE") {
                ?>
                    <script>
                        alert("<?php echo "Welcome to San Mateo SHS";?>");
                        window.location = "../admin/admin_dashboard.php";
                    </script>
                <?php
                mysqli_query($conn,"INSERT INTO audit_log(name,utype,action,timedate) VALUES('$name','$type','LOGIN IN SYSTEM AT',NOW())")
					or die(mysqli_error($conn));
					
            }elseif($counter== true && $type=="2" && $stat=="ACTIVE") {
                ?>
                    <script>
                        alert("<?php echo "Welcome to San Mateo SHS";?>");
                        window.location = "../teachers/tchr_dashboard.php";
                    </script>
                <?php
                mysqli_query($conn,"INSERT INTO audit_log(name,utype,action,timedate) VALUES('$name','$type','LOGIN IN SYSTEM AT',NOW())")
					or die(mysqli_error($conn));
					
            }elseif($counter== true && $type=="3" && $stat=="ACTIVE") {
                ?>
                    <script> 
                        alert("<?php echo "Welcome to San Mateo SHS";?>");
                        window.location = "../student/dashboard.php";
                    </script>
                <?php
                
            } else {
                ?>
                <script>
                    alert('Your account might be Deactivated else you can try again');
                    window.history.back();
                </script>
                <?php 
            }
        } else {
            ?>
                <script>
                    alert('Invalid username or password!');
                    window.location = "../login.php";
                </script>
            <?php 
        }
            
    }

    $conn->close();

?>