<html>
<head>
<title>Add Books </title>
</head>
<body>
<?php
session_start();
//include('includes/header.html');
include('mysqli_connect.php');
//if (isset($_SESSION['username'])) {
	
    if($_SERVER['REQUEST_METHOD'] == 'POST'){		
		$BookID = $_POST['BookID'];
		$CategoryID = $_POST['CategoryID'];
		$BookName = $_POST['BookName'];
		$ISBNCode = $_POST['ISBNCode'];
		$PublishDate = $_POST['PublishDate'];
		$Version = $_POST['Version'];
		$Writer1 = $_POST['Writer1'];
		$Writer2 = $_POST['Writer2'];
		$Price = $_POST['Price'];
		$Description = $_POST['Description'];
		echo "post succesfful";
		$query= "INSERT INTO Book (BookID,CategoryID,BookName,ISBNCode,PublishDate,Version,Writer1,Writer2,Price,Description) VALUES('$BookID','$CategoryID','$BookName','$ISBNCode','$PublishDate','$Version','$Writer1','$Writer2','$Price','$Description')";
		//echo $query;
		if(move_uploaded_file($_FILES['the_file']['tmp_name'], "Pics/{$_FILES['the_file']['name']}")){
			echo '<p>The file has been uploaded</p>';
		}
		if (!mysqli_query($dbc,$query)) {
			echo "error!".mysqli_error($dbc);
		
		}
		else{
			
			echo "Successfully added, go to <a href='add_book.php'>add books </a> page"	;
			
		}
	}
	else{
?>	
		<form action ="add_book.php" enctype="multipart/form-data" method="POST">
		<p>BookID:<input type="text" name= "BookID"></p>
		<p>CategoryID:<input type="text" name= "CategoryID"></p>
		<p>BookName:<input type="text" name= "BookName"></p>
		<p>ISBNCode:<input type="text" name= "ISBNCode"></p>
		<p>PublishDate:<input type="text" name= "PublishDate"></p>
		<p>Version:<input type="text" name= "Version"></p>
		<p>Writer1:<input type="text" name= "Writer1"></p>
		<p>Writer2:<input type="text" name= "Writer2"></p>
		<p>Price:<input type="text" name= "Price"></p>
		<p>Description:<input type="text" name= "Description"></p>
		
		<input type="hidden" name="MAX_FILE_SIZE" value="300000">
		<p><input type="file" name="the_file"></p>
		
		<br>
		
		
		<input type="submit" value="ADD BOOK">
		</form>
		
<?php		

	}	
//}

//else{
//	echo  "<h4>You are not logged in. Please <a href='loginex.php'>LOG IN</a></h4>";
//} // END IF for outside IF

//include('includes/footer.html');

?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="includes/script.js"></script>
</body>
</html>