<?php
    include ("../php/dbase_config.php");

    $sql = "SELECT * FROM tblfiles";
    $result = mysqli_query($conn, $sql);

    $files = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if (isset($_GET['file_id'])) {
        $id = $_GET['file_id'];

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

            mysqli_query($conn,"INSERT INTO history_tbl(std_id,std_no,std_Action,timedate)
                                SELECT std_id, '$LRN', 'Downloaded Module for (Identify & fetch subj ID)',NOW()
                                FROM students_tbl") or die(mysqli_error($conn));
            
            exit;
        }

    }
?>