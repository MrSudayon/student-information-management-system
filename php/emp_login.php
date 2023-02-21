<?php
    include "dbase_config.php";

    
    if(isset($_POST['loginbut'])){
    	session_start();
        
            
		$usern = $_POST['uemail'];
		$password = $_POST['upass'];
		
		$qry =  mysqli_query($conn, "SELECT * FROM teachers_tbl WHERE user='$usern' AND pass='$password'");
		$result = mysqli_fetch_array($qry);
		
		$counter = mysqli_num_rows($qry);
         
		if($counter > 0) {   
            $id = $result['id'];
            $stat = $result['tchr_STATUS'];
            $name = ucfirst($result['tchr_LAST']).", ".$result['tchr_FIRST'];
            $_SESSION['SESSION_ID'] = $id;
			$_SESSION['SESSION_USER'] = $name;
			date_default_timezone_set('Asia/Manila');
			$date = date('Y-m-d');
			$time = date('H:i:s');
            
            if($counter== true && $stat=="ACTIVE") {
                ?>
                    <script>
                        alert("<?php echo "Welcome to San Mateo SHS";?>");
                        window.location = "../teachers/tchr_dashboard.php";
                    </script>
                <?php
                mysqli_query($conn,"INSERT INTO audit_logs(name,utype,action,timedate) VALUES('$name','Teacher','LOGIN IN SYSTEM AT',NOW())")
					or die(mysqli_error($conn));
					
            } else {
                ?>
                <script>
                    alert('Teacher Account might be Inactive for a long time, else you can try again');
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