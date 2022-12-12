<?php
            // connect to the database
            include ("../php/dbase_config.php");
            // Uploads files
            if (isset($_POST['addbut'])) { // if save button on the form is clicked
                // name of the uploaded file
                
                $desc = $_POST['descript'];
                $link = $_POST['link'];
                $ccode = 'RSCH12';

                        $sql = "INSERT INTO tbllinks (ID,description,links,assigned_course) VALUES (NULL,'$desc','$link','$ccode')";
                        if (mysqli_query($conn, $sql)) {
                            ?>
                            
                                <script>
                                    alert("Link Added successfully");
                                    window.location = "../teachers/links.php";
                                </script>	
                            <?php
                        }else {
                        echo "Failed to add link.";
                        echo"<script> window.history.back(); </script>";
                    }
                }
?>
                    