<!doctype html>
<html>
<head>
<title>View Trees </title>
</head>
<body>
<?php
session_start();
include('includes/header.html');

if(isset($_SESSION['username'])) {
	// USER has successfully logged in so we can connect to database and retrieve records
    INCLUDE("MYSQLI_CONNECT.PHP");
	$query= "select * from trees";
	$rows = mysqli_query($dbc,$query);
	
	echo "<table  border='0' width="90%" align='center'>";
	echo "<tr><th> Tree name </th><th>latin name </th><th>Description</th>";
	while($row = mysqli_fetch_array($rows,MYSQLI_ASSOC)){
		echo "<tr>";
		echo "<td>".$row['treeid']."</td>";
		echo "<td>".$row['treename']."</td>";
		echo "<td>".$row['latinname']."</td>";
		echo "<td>".$row['descrption']."</td>";
	}
	echo "</table>";
	mysqli_close($dbc);	
}else{ // USER has not provided valid credentials. Redirect them back to login page
	echo  "<h4>Invalid login credentials. Please <a href='loginex.php'>TRY AGAIN</a></h4>";	
}

include('includes/footer.html');
?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="includes/script.js"></script>
</body>
</html>