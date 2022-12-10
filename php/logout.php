<?php
    session_start();
    unset($_SESSION['SESSION_ID']);
    unset($_SESSION['SESSION_FNAME']);
    header("Location:../index.html");
?>