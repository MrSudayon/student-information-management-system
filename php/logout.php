<?php
    session_start();
    unset($_SESSION['SESSION_ID']);
    unset($_SESSION['SESSION_USER']);
    unset($_SESSION['SESSION_NAME']);
?>
<!-- Feb 26 -->
        <script>
            window.location.href="http://sanmateoshs.infinityfreeapp.com/";
            alert("logged out")
        </script>