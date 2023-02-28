<?php
    // connect to the database
    include ("../php/dbase_config.php");
    // Uploads files
    if (isset($_POST['save'])) { // if save button on the form is clicked
        // name of the uploaded file
        
        $filename = $_FILES['myfile1']['name'];

        // destination of the file on the server
        $destination = '../uploads/modules/' . $filename;

        // get the file extension
        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        // the physical file on a temporary uploads directory on the server
        $file = $_FILES['myfile1']['tmp_name'];
        $date =  date("Y-m-d");
        $size = $_FILES['myfile1']['size'];
        $desc = $_POST['weektxt'];
        $uploadedto = $_POST['subj'];
        $status = $_POST['stat'];

        if (!in_array($extension, ['zip', 'pdf', 'docx', 'pptx','xlsx'])) {
            echo " <script> alert('file extension in not valid'); window.history.back();</script>";
        } elseif ($_FILES['myfile1']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
            echo " <script> alert('file too large'); window.history.back();</script>";
            } else {
            // move the uploaded (temporary) file to the specified destination
            if (move_uploaded_file($file, $destination)) {
                $sql = "INSERT INTO tblfiles (ID,Description,name,uploadedto, size, date, downloads, status) VALUES (NULL,'$desc','$filename','$uploadedto', $size, '$date', 0, '$status')";
                if (mysqli_query($conn, $sql)) {
                    ?>
                        <script>
                            alert("File uploaded successfully");
                        </script>	
                    <?PHP
                    header("Refresh:0; url=../teachers/modules.php");
                }
            } else {
                echo "Failed to upload file.";
            }
        }
        $conn->close();
    }
?>
                    