<?php
    include ("../php/dbase_config.php");
    include "../php/auth.php";
    
    $sql = "SELECT * FROM tblfiles";
    $result = mysqli_query($conn, $sql);
    

    $files = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $sess_name = $_SESSION['SESSION_FNAME'];
    
    if (isset($_GET['file_id'])) {
        $id = $_GET['file_id'];
        $sub_code = $_GET['sub_code'];
        
        // fetch file to download from database
        $sql = "SELECT * FROM tblfiles WHERE id=$id";
        $result = mysqli_query($conn, $sql);

        $file = mysqli_fetch_assoc($result);
        $filepath = '../uploads/modules/'.$file['name'];

        if (file_exists($filepath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Type: application/force-download');
            header('Content-Disposition: attachment; filename=' . basename($filepath));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath));
            readfile('../uploads/modules/' . $file['name']);
            flush(); // Flush system output buffer
            // Now update downloads count
            $newCount = $file['downloads'] + 1;
            $updateQuery = "UPDATE tblfiles SET downloads=$newCount WHERE id=$id";
            mysqli_query($conn, $updateQuery);
            
            $his = "INSERT INTO history_tbl (id,uName,uType,uAction,timedate)
                    VALUES (null,'$sess_name',3,'Downloads modules from $sub_code',NOW())";
            mysqli_query($conn,$his);        
            
            
            exit;
        }

    }
?>