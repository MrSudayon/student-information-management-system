<?php  
    include "../php/dbase_config.php";

    if(isset($_POST['create_acc'])){
        $lname=$_POST['lnametxt'];
        $lname=$_POST['lnametxt'];
        $fname=$_POST['fnametxt'];
        $midname=$_POST['midtxt'];
        $sf = $_POST['suffix'];
        $lrn=$_POST['lrntxt'];
        $email=$_POST['emailtxt'];
        $pass=$_POST['passtxt'];
        $conpass=$_POST['conpasstxt'];
       
		$regcode = $_POST['regcode'];
		
		             
        $qry = mysqli_query($conn,"SELECT * FROM tbl_code order by ID DESC LIMIT 1");
        $result = mysqli_fetch_array($qry);

		$stat = $result['ACCESSCODE'];

        if($regcode != $stat){
			?>
				<script>
					alert("Make sure that you enter the code given by registrar");
                    window.history.back();
                </script>
			<?php

        }
        elseif($pass != $conpass){
			?>
				<script>
					alert("Password Confirmation Didn't Match");
                    window.history.back();
                </script>
			<?php
		}else{
            
            /* INSERT INTO Students_tbl aswell. with constraints stud_id from users table */
            $sql = "INSERT INTO students_tbl (std_id,std_FIRST,std_LAST,std_MID,std_SUFFIX,LRN,std_EMAIL,std_STATUS)
                    VALUES(null,'$fname','$lname','$midname','$sf','$lrn','$email','ACTIVE')";

            if (mysqli_query($conn, $sql)) {
                ?>
                <script>
                    alert("New record created successfully")
                    window.location.href = "../index.html";
                </script>
                <?php
            } else {
                ?>
                <script>
                    alert("<?php  echo "Error: " . $sql . "<br>" . mysqli_error($conn); ?>")
                </script>
            <?php
            }
        }
	    $conn->close();
    }


?>