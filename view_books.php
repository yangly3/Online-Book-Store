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