<?php 
session_start();
session_destroy();
unset($_SESSION['username']);
echo "alert ('You have successfully logged out!')";
header('location:1tlogin.php');

 ?>