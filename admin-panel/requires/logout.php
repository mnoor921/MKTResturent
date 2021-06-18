<?php
    session_start();
    unset($_SESSION["admin_id"]);
    // unset($_SESSION["name"]);
    header("Location:../login.php");
    session_destroy();
?>