<?php 
    SESSION_START();
    unset($_SESSION['user_name']);
    header("Location: login.php");
?>