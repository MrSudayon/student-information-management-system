<?php
    include "../dbase/db_connect.php";

    
    if(isset($_POST['loginbut'])){
    	

		$usern = $_POST['uemail'];
		$password = $_POST['upass'];
		
		$qry =  mysqli_query($conn, "SELECT * FROM user WHERE EMAIL='$usern' AND PASS='$password'");
		$result = mysqli_fetch_array($qry);
		
		$stat = $result['STATUS'];
		$type = $result['UTYPE'];
		$name = $result['FIRST'];

		$counter = mysqli_num_rows($qry);
         
		if($counter > 0) {   
            if($counter== true && $type=="1" && $stat=="ACTIVE") {
                ?>
                    <script>
                        alert("<?php echo"Welcome to San Mateo SHS";?>");
                    </script>
                
                <?php
                header("refresh:0; url = ../admin/admin_dashboard.php");
            }elseif($counter== true && $type=="2" && $stat=="ACTIVE") {
                ?>
                    <script>
                        alert("<?php echo"Welcome to San Mateo SHS";?>");
                    </script>
                
                <?php
                header("refresh:0; url = ../html/dashboard.php");
            }elseif($counter== true && $type=="3" && $stat=="ACTIVE") {
                ?>
                    <script>
                        alert("<?php echo"Welcome to San Mateo SHS";?>");
                    </script>
                
                <?php
                header("refresh:0; url = ../html/dashboard.php");
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
                window.history.back();
            </script>
            <?php 
        }
            
    }

    $conn->close();

?>