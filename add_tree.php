<html>
<head>
<title>Add a Tree </title>
</head>
<body>
<?php
session_start();
include('includes/header.html');

//if (isset($_SESSION['username'])) {
	include("mysqli_connect.php");
    if($_SERVER['REQUEST_METHOD']=='POST'){		
		$treename = $_POST('treename');
		$latinname = $_POST('latinname');
		$description = $_POST('description');
		$query= "INSERT INTO trees (treename.latinname,description) VALUES('$treename','$latinname','$description')";
		//echo $query;
		
		if (!mysqli_query($dbc,$query)) {
			echo "error!".mysqli_error($dbc);
		}
		else{
			echo "Success!"	;			
		}
	}
	else{
?>	
		<form action ="add_tree.php" method="POST">
		<p>TREENAME:<input type="text" name= "treename"></p>
		<p>LATIN NAME:<input type="text" name= "latinname"></p>
		<p>DESCRIPTION:<textarea name= "description" rows="4" columns="50"></textarea></p>		
		<input type="submit" value="ADD TREE">
		</form>
		
<?PHP		
	}
//}

//else{
//	echo  "<h4>You are not logged in. Please <a href='loginex.php'>LOG IN</a></h4>";
//} // END IF for outside IF

include('includes/footer.html');

?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="includes/script.js"></script>
</body>
</html>