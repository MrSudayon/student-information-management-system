<?php
$submit = isset($_POST["submit"]);

    if($submit) {
    
        header("location: ../html/dashboard.html");
        echo "clicked";
    }

?>