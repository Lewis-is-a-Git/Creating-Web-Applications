<?php
   include('settings.php');
   session_start();
   // check session storage if user is still logged in
   $user_check = $_SESSION['login_user'];
   $ses_sql = @mysqli_query($db,"SELECT username FROM managers WHERE username = '$user_check' ");
   $row = @mysqli_fetch_assoc($ses_sql);
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
?>
