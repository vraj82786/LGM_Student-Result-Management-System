<?php
   include('init.php');
   session_start();
   $db = mysqli_select_db($conn,'srms');
   $user_check = $_SESSION['login'];
   
   $ses_sql = mysqli_query($conn,"select user_id from user where user_id= '$user_check'");
   $row = mysqli_fetch_array($ses_sql);
   
   $login_session = $row['user_id'];
   
   if(!isset($_SESSION['login'])){
      header("Location:login.php");
   }
?>