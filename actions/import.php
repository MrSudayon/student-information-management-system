<?php
session_start();
include('dbconfig.php');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if(isset($_POST['save_excel_data']))
{
    $fileName = $_FILES['import_file']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowed_ext = ['xls','csv','xlsx'];

    if(in_array($file_ext, $allowed_ext))
    {
        $inputFileNamePath = $_FILES['import_file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        $count = "0";
        foreach($data as $row)
        {
            if($count > 0)
            {
                $namest = $row[0];
				$LRN = $row[1];
				$grade = $row[2];
				$gender = $row[3];
				$enrolleddate = $row[4];
				$phone = $row[5];
				$address = $row[6];
				$dob = $row[7];
		
				// Insert into database
				$sql = "INSERT  INTO student_tbl(ID,name, LRN, grade,gender,enrolleddate,phone,address,dob) VALUES ('',$namest, $LRN,$grade,$gender,$enrolleddate,$phone,$address,$dob)";
				mysqli_query($conn, $sql);
            }
            else
            {
                $count = "1";
            }
        }

            echo("Successfully Imported");
       
    }
    else
    {
		echo("Invalid File");
    }
}
?>