<?php
    include "dbase_config.php";

    
    if(isset($_POST['loginbut'])){
    	session_start();
        
            
		$usern = $_POST['uemail'];
		$password = $_POST['upass'];
		
		$qry =  mysqli_query($conn, "SELECT * FROM admin_tbl WHERE user='$usern' AND pass='$password'");
		$result = mysqli_fetch_array($qry);
		
		$counter = mysqli_num_rows($qry);
         
		if($counter > 0) {   
            $id = $result['id'];
            $stat = $result['enabled'];
            $user = ucfirst($result['name']);
            $_SESSION['SESSION_ID'] = $id;
			$_SESSION['SESSION_USER'] = $user;
			date_default_timezone_set('Asia/Manila');
			$date = date('Y-m-d');
			$time = date('H:i:s');
            
            if($counter== true && $stat==1) {
                ?>
                    <script>
                        alert("<?php echo "Welcome to San Mateo SHS";?>");
                        window.location = "../admin/admin_dashboard.php";
                    </script>
                <?php
				mysqli_query($conn,"INSERT INTO audit_logs(name,utype,action,timedate) VALUES('$user','Admin','LOGIN IN SYSTEM AT',NOW())")
				or die(mysqli_error($conn));
            } else {
                ?>
                <script>
                    alert('Admin Account might be disabled, else you can try again');
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