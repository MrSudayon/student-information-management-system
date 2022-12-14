<?php

include ("../php/dbase_config.php");

    $date=date("m/d/y");
    if(isset($_POST['gencode'])){

        $n=5;
        function getName($n) {
            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';
        
            for ($i = 0; $i < $n; $i++) {
                $index = rand(0, strlen($characters) - 1);
                $randomString .= $characters[$index];
            }
        
            return $randomString;
        }
        $code = getName($n);
        
        $sql = "INSERT INTO tbl_code(ID,ACCESSCODE,DATE)
        VALUES(null,'$code','$date')";
        if (mysqli_query($conn, $sql)){	
            ?>
                <script>
                    alert("New Code has been created. Previous access code will not be valid anymore");
                    window.location.href = "http://localhost/A-web-and-android-based-management-information-system-for-Senior-HS-main/admin/student_management.php";
                    
                </script>		
            <?php
            
        }
        else {
                ?>
                <script>
                    alert("<?php  echo "Error: " . $sql . "<br>" . mysqli_error($conn); ?>")
                </script>
            <?php
            }
        
	    $conn->close();
    }

?>