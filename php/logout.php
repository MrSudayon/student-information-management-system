<?php
    session_start();
    unset($_SESSION['SESSION_ID']);
    unset($_SESSION['SESSION_USER']);

    header("Location:../index.html");
?>