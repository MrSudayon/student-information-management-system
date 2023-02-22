<?php
    include '../php/dbase_config.php';
    require_once 'PHPExcel/PHPExcel.php';

    // Set the upload directory and file name
    $uploadDir = '../uploads/stddata';
    $uploadFile = $uploadDir . basename($_FILES['import_file']['name']);
    
    // Check if the file was uploaded successfully
    if (move_uploaded_file($_FILES['import_file']['tmp_name'], $uploadFile)) {
        // Create a new PHPExcel object
        $objPHPExcel = PHPExcel_IOFactory::load($uploadFile);
        
        // Get the active worksheet
        $worksheet = $objPHPExcel->getActiveSheet();
        
        // Get the highest row number and column letter
        $highestRow = $worksheet->getHighestDataRow();
        $highestColumn = $worksheet->getHighestDataColumn();
        
        // Convert the column letter to a number
        $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
        
 
        // Loop through each row in the worksheet and insert the data into the database
        for ($row = 2; $row <= $highestRow; $row++) {
            $rowData = array();
            
            for ($col = 0; $col < $highestColumnIndex; $col++) {
                $cellValue = $worksheet->getCellByColumnAndRow($col, $row)->getValue();
                $rowData[] = $cellValue;
            }
            
            $sql = "INSERT INTO student_tbl(ID,name, LRN, grade,gender,enrolleddate,phone,address,dob) VALUES ('$rowData[0]',$rowData[1], $rowData[2],$rowData[3],$rowData[4],$rowData[5],$rowData[6],$rowData[7],$rowData[8])";
            
            if ($conn->query($sql) === false) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        
        // Close the database connection
        $conn->close();
        
        // Delete the uploaded file
        unlink($uploadFile);
        
        echo "File uploaded and data inserted successfully.";
    } else {
        header("Location:../admin/student_management.php");
        echo "Error uploading file.";
        
    }
?>

<!-- 
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
-->