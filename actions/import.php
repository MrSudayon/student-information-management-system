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
    echo "You have total ".$totalSheet." sheets".
    $html="<table border='1' color=s>";
    $html.="<tr> <th>Name</th>
    <th>LRN</th>
    <th>Grade</th>
    <th>Gender</th>
    <th>Enrolled Date</th>
    <th>Address</th>
    <th>Phone #</th>
    <th>Date of Birth</th>
    <th>Username</th>
    <th>pass</th>
    <th>enabled</th></tr>";

    /* For Loop for all sheets */
    for($i=0;$i<$totalSheet;$i++){

      $Reader->ChangeSheet($i);

      foreach ($Reader as $Row)
      {
        $html.="<tr>";
        $namest = isset($Row[0]) ? $Row[0] : '';
        $LRN = isset($Row[1]) ? $Row[1] : '';
        $grade = isset($Row[2]) ? $Row[2] : '';
        $gender = isset($Row[3]) ? $Row[3] : '';
        $enrolleddate = isset($Row[4]) ? $Row[4] : '';
        $address = isset($Row[5]) ? $Row[5] : '';
        $phone = isset($Row[6]) ? $Row[6] : '';
        $dob = isset($Row[7]) ? $Row[7] : '';
        $user = isset($Row[8]) ? $Row[8] : '';
        $pass = isset($Row[9]) ? $Row[9] : '';
        $en = isset($Row[10]) ? $Row[10] : '';

        $html.="<td>".$namest."</td>";
        $html.="<td>".$LRN."</td>";
        $html.="<td>".$grade."</td>";
        $html.="<td>".$gender."</td>";
        $html.="<td>".$enrolleddate."</td>";
        $html.="<td>".$address."</td>";
        $html.="<td>".$phone."</td>";
        $html.="<td>".$dob."</td>";
        $html.="<td>".$user."</td>";
        $html.="<td>".$pass."</td>";
        $html.="<td>".$en."</td>";
        $html.="</tr>";



        // Insert into database
        $sql= "INSERT  INTO student_tbl (`id`, `name`, `LRN`, `grade`, `gender`, `enrolleddate`, `address`, `phone`, `dob`, `user`, `pass`, `enabled`)
         VALUES (null,'$namest', '$LRN','$grade','$gender','$enrolleddate','$address','$phone','$dob','$user','$pass','$en')";
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