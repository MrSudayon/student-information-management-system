<?php
require('../library/php-excel-reader/excel_reader2.php');
require('../library/SpreadsheetReader.php');
include ("../php/dbase_config.php");


if(isset($_POST['save_excel_data'])){
  try{
    $uploadFilePath = '../uploads/stddata/'.basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);
    $Reader = new SpreadsheetReader($uploadFilePath);
    $totalSheet = count($Reader->sheets());
    echo "You have total ".$totalSheet." sheets";
    
    for($i=0;$i<$totalSheet;$i++){

      $Reader->ChangeSheet($i);

      foreach ($Reader as $Row)
      { 
        $defaultpass="student@123";  
        $html.="<tr>";
        $namest = isset($Row[0]) ? $Row[0] : '';
        $LRN = isset($Row[1]) ? $Row[1] : '';
        $grade = isset($Row[2]) ? $Row[2] : '';
        $section = isset($Row[3]) ? $Row[3] : '';
        $strand = isset($Row[4]) ? $Row[4] : '';
        $sy = isset($Row[5]) ? $Row[5] : '';
        $originating_sec = isset($Row[6]) ? $Row[6] : '';
        $gender = isset($Row[7]) ? $Row[7] : '';
        $enrolleddate = isset($Row[8]) ? $Row[8] : '';
        $address = isset($Row[9]) ? $Row[9] : '';
        $phone = isset($Row[10]) ? $Row[10] : '';
        $dob = isset($Row[11]) ? $Row[11] : '';
        $user = isset($Row[12]) ? $Row[12] : '';
        $pass = isset($Row[13]) ? $Row[13] : '';

        $username_char = substr($namest, 0, 4);
        $username_int = substr($LRN, 0, 3);

        $html.="<td>".$namest."</td>";
        $html.="<td>".$LRN."</td>";
        $html.="<td>".$grade."</td>";
        $html.="<td>".$section."</td>";
        $html.="<td>".$strand."</td>";
        $html.="<td>".$sy."</td>";
        $html.="<td>".$originating_sec."</td>";
        $html.="<td>".$gender."</td>";
        $html.="<td>".$enrolleddate."</td>";
        $html.="<td>".$address."</td>";
        $html.="<td>".$phone."</td>";
        $html.="<td>".$dob."</td>";
        $html.="<td>".$user."</td>";
        $html.="<td>".$pass."</td>";
        $html.="</tr>";

        // Insert into database
        $sql= "INSERT INTO student_tbl (`id`, `name`, `LRN`, `grade`, `section`, `strand`, `schoolyear`, `originating_sec`, `gender`, `enrolleddate`, `address`, `phone`, `dob`, `user`, `pass`, `enabled`)
         VALUES (null,'$namest', '$LRN','$grade','$section','$strand','$sy','$originating_sec','$gender','$enrolleddate','$address','$phone','$dob','$username_char.$username_int','$defaultpass',1)";
        if (mysqli_query($conn, $sql)) {
          echo "New record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    $html.="</table>";
    echo $html;
    echo "<br />Data Inserted in dababase";
  }
  }catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();
  }
}
?>
        <script>
            window.location.href="../admin/student_management.php";
            alert("list Successfully imported")
        </script>