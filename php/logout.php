<?php
include "../php/dbase_config.php";
require_once "../php/auth.php";
    

    mysqli_query($conn, "INSERT INTO audit_logs (name, utype, action, timedate) VALUES ('$sess_name', '$sess_role', 'LOGGED OUT ON SYSTEM AT ', NOW())")or die(mysqli_error($conn));

    unset($_SESSION['SESSION_ID']);
    unset($_SESSION['SESSION_USER']);
    unset($_SESSION['SESSION_NAME']);
?>
<!-- Mar -->
        <script>
            window.location.href="../index.html";
            alert("logged out")
        </script>
