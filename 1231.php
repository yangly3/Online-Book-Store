<html>
<head>
<title>View Trees </title>
</head>
<body>
<?php
session_start();
include('includes/header.html');
//echo "USERNAME: ";
//echo $_SESSION['username'];
if(isset($_SESSION['username'])) {
	//echo "You are logged in, this is where we display trees";
	
	include ('mysqli_connect.php');
 
	// Default query for this page:
	$q = "SELECT * from trees;";

	// Create the table head:
	echo '<table border="0" width="90%" cellspacing="3" cellpadding="3" align="center">
	<tr>
		<td align="left" width="20%"><b>Tree Name</b></td>
		<td align="left" width="20%"><b>Latin</b></td>
		<td align="left" width="50%"><b>Description</b></td>
		<td align="center" width="10%"><b>Action</b></td>

	</tr>';

	// Display all the prints, linked to URLs:
	$r = mysqli_query ($dbc, $q);
	while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC)) {

		// Display each record:
		echo "\t<tr>
			<td align=\"left\">{$row['treename']}</td>
			<td align=\"left\">{$row['latinname']}</td>
			<td align=\"left\">{$row['description']}</td>
			<td align=\"right\"><a href=\"edit_tree.php?treeid={$row['treeid']}\">EDIT</a></td>
			<td align=\"right\"><a href=\"delete_tree.php?treeid={$row['treeid']}\">DELETE</a></td>
		</tr>\n";

	} // End of while loop.

	echo '</table>';
	mysqli_close($dbc);	
	
	
	
}else{
	echo  "<h4>Invalid login credentials. Please <a href='loginex.php'>TRY AGAIN</a></h4>";	
}


include('includes/footer.html');
?>

</body>
</html>