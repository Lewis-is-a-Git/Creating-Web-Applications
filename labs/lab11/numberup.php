<?php
    session_start(); //Start session
    $num = $_SESSION["number"];  // copy value to 
    $num++;
    $_SESSION["number"] = $num; // update the session variable
    header("location:number.php"); // redirect
?>
