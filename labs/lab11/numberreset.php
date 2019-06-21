<?php
    session_start(); //Start session
    $_SESSION["number"] = 0; // update the session variable
    header("location:number.php"); // redirect
?>
