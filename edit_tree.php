<!doctype html>
<html>
<head>
<title>Edit a Tree</title>
</head>
<body>
<?php
session_start();
include('includes/header.html');
if (isset($_SESSION['username'])) {
    echo "Add your code here";
}else {
	echo  "<h4>You are not logged in. Please <a href='loginex.php'>LOG IN</a></h4>";
}
include('includes/footer.html');
?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="includes/script.js"></script>
</body>
</html>