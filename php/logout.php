<?php
    session_start();
    unset($_SESSION['SESSION_ID']);
    unset($_SESSION['SESSION_FNAME']);
    unset($_SESSION['SESSION_LNAME']);
    unset($_SESSION['SESSION_MID']);
    header("Location:../index.html");
?>