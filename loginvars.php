<!doctype html>
<html>
<head>
<title>Home Page </title>
</head>
<body>
<?php
session_start();
include('includes/header.html');

if (isset($_SESSION['username'])) { // if the SESSION is already set
	$username = $_SESSION['username'];
	echo "Welcome $username. Click on a menu item above to continue";
}else {
// check login credentials
	if (isset($_POST['username'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];	
		include("mysqli_connect.php");
		$query ="SELECT * from user2 where username ='$username' and password='$password' ";
		$row = @mysqli_connect.php($dbc,$query);
		
		if (mysqli_num_rows($row)==1 ){
			$_SESSION['username']=$username;
			echo "You are logged in!";		
		}
		else {
			echo "Invalid";
		}
	}else {
		echo "you are not logged in";		
			
	}
}

include('includes/footer.html');
?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="includes/script.js"></script>
</body>
</html>