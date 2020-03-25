<?php
session_start();

 if(isset($_SESSION['username'])){

    $_SESSION['msg'] = "You must log in first to view this page";
    

 }

if(isset($_GET['logout'])){

	session_destroy();
	unset($_SESSION['username']);
	header("location:1tlogin.php");
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
</head>
<body>


		<h1>This is the homepage</h1>
		 <?php if(isset($_SESSION['success'])) : ?>

		 <div>
		 	<h3>
		 		<?php

		 		echo $_SESSION['success'];
		 		unset($_SESSION['success']);
		 		?>

		 	</h3>
		 </div>
<?php endif ?>
<?php if(isset($_SESSION['username'])) :?>
	<h3>Welcome <strong><?php echo $_SESSION['username'] ?>;</strong></h3>
	<button type="submit" name="logout"><a href="1tindex.php?logout='1'">Log out</a></button>
<?php endif ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="includes/script.js"></script>
</body>
</html>