<?php
session_start();
include('mysqli_connect.php');

if (isset($_SESSION["username"]) {

	echo  "<a href="1tlogout.php" class="myButton" type="submit">Log Out</a>";
}else{
	echo "<a href="1tlogin.php" class="myButton" type="submit" name="login_user">Customer Login</a>";
}
?>