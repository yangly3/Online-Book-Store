<!doctype html>
<html>
<head>
<title>Logout</title>
</head>
<body>
<?php
session_start();
session_destroy();
unset($_SESSION['username']);
//header('location:login.php');
include('includes/header.html');
echo "You have successfully logged out";
echo  "<h4>To log back in: <a href='loginex.php'>LOGIN</a></h4>";


include('includes/footer.html');
?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="includes/script.js"></script>
</body>
</html>