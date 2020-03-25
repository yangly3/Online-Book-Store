<!doctype html>
<html>
<head>
<title>Add a Book </title>
</head>
<body>
<?php
session_start();
//include('includes/header.html');

include('mysqli_connect.php');
	$query= "select * from Book";
	$rows = mysqli_query($dbc,$query);
	
	echo "<table  border='0' >";
	echo "</table>";
	while($row = mysqli_fetch_array($rows,MYSQLI_ASSOC)){		
		echo "<p>".$row['BookID']." | ";
		echo $row['BookName']." | ";
		echo $row['ISBNCode']." | ";
		echo $row['Writer1']." | ";
		echo $row['Price']." | ";
		echo $row['Description']."</p>";		
	}	
	//echo "<table  border='0' width="90%" align='center'>";
	//echo "<tr><th> Category ID</th><th> Category Name </th>";
	/*while($row = mysqli_fetch_array($rows,MYSQLI_ASSOC)){
		echo "<tr>";
		echo "<td>".$row['CategoryID']."</td>";
		echo "<td>".$row['CategoryName']."</td>";
		}
		<form action ="insert.php" method="POST">
		<p>Category ID:<input type="text" name= "bookid"></p>
		<p>CategoryName<input type="text" name= "bookname"></p>
		<p>DESCRIPTION:<textarea name= "description" rows="4" columns="50"></textarea></p>		
		<input type="submit" value="ADD TREE">
		</form>
		
	echo "</tr></table>"; */

mysqli_close($dbc);		
		
		
?>	
		
		
<?PHP		
	
	/*
    if($_SERVER['REQUEST_METHOD']=='POST'){		
		$bookname = $_POST('bookname');
		$bookid = $_POST('bookid');
		$description = $_POST('description');
		$query= "INSERT INTO Book (BookID,BookName,Description) VALUES('$bookid','$bookname','$description')";
		//echo $query;
		
		if (!mysqli_query($dbc,$query)) {
			echo "error!".mysqli_error($dbc);
		}
		else{
			echo "Success!"	;			
		}
	}
	else{
		*/

//include('includes/footer.html');

?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="includes/script.js"></script>
</body>
</html>