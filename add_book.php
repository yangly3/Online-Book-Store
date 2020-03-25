<html>
<head>
<meta charset="utf-8">
<title>Add Books</title>
<link href="includes/style.css" rel="stylesheet" type="text/css">
</head>
<body>
	
<div class="header">	
	<div>
		        <?php
			    session_start();

				if(isset($_SESSION['username'])){	
				
				echo  '<a href="1tlogout.php" class="myButton" type="submit">Log Out</a>';
				
				}

		       ?>
         </div>
<div id="Loc">
			<br><em>Edit Books</em><br><br>
</div>
			<div class="top_banner">			
            <div class="top_logo"><img src="Images/1.jpeg" alt="LOGO" />
			</div>
	
	
<?php
session_start();

include('mysqli_connect.php');

	
    if($_SERVER['REQUEST_METHOD'] == 'POST'){		
		//$BookID = $_POST['BookID'];
		$CategoryID = $_POST['CategoryID'];
		$BookName = $_POST['BookName'];
		$ISBNCode = $_POST['ISBNCode'];
		$PublishDate = $_POST['PublishDate'];
		$Version = $_POST['Version'];
		$Writer1 = $_POST['Writer1'];
		$Writer2 = $_POST['Writer2'];
		$Price = $_POST['Price'];
		$Price = $_POST['Quantity'];
		$Description = $_POST['Description'];
		echo "post succesfful";
		//$query= "INSERT INTO Book (BookID,CategoryID,BookName,ISBNCode,PublishDate,Version,Writer1,Writer2,Price,Description) VALUES('$BookID','$CategoryID','$BookName','$ISBNCode','$PublishDate','$Version','$Writer1','$Writer2','$Price','$Description')";
		$query= "INSERT INTO Book (CategoryID,BookName,ISBNCode,PublishDate,Version,Writer1,Writer2,Price,Description) VALUES('$CategoryID','$BookName','$ISBNCode','$PublishDate','$Version','$Writer1','$Writer2','$Price','$Description')";
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
	<div id="middle-transparent">
	<div style="float: left; width: 340;" >
		<form action ="add_book.php" enctype="multipart/form-data" method="POST">
			<table class="tftable" border="1">				
				<tr><td>BookName</td><td><input type="text" name="BookName" id=""></td></tr>				
				<tr><td>CategoryID:</td><td><select name="CategoryID">						
						<option value="1">Classic</option>
						<option value="2">Life</option>
						<option value="3">Science</option>
						<option value="4">Fiction</option>
						<option value="5">History</option>
						</select>  </td></tr>	
				<tr><td>ISBNCode</td><td><input type="text" name="ISBNCode" id=""></td></tr>
				<tr><td>PublishDate:</td><td><input type="date" name="PublishDate" id=""></td></tr>
				<tr><td>Version:</td><td><input type="text" name="Version" id=""></td></tr>	
				<tr><td>Writer1:</td><td><input type="text" name="Writer1" id=""></td></tr>
				<tr><td>Writer2:</td><td><input type="text" name="Writer2" id=""></td></tr>
				<tr><td>Price:</td><td><input type="text" name="Price" id=""></td></tr>
				<tr><td>Quantity:</td><td><input type="text" name="Quantity" id=""></td></tr>
				<tr><td>Description:</td><td><textarea rows="4" cols="50" name="Description" id=""></textarea></td></tr>
				
			</table>
		
		<input type="hidden" name="MAX_FILE_SIZE" value="300000">
		<p><input type="file" name="the_file"></p>
		
		<br>
		
		
		<input type="submit" value="ADD BOOK">
		</form>
	</div>
</div>
		
<?php		

	}	
//}

//else{
//	echo  "<h4>You are not logged in. Please <a href='loginex.php'>LOG IN</a></h4>";
//} // END IF for outside IF

//include('includes/footer.html');

?>
</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="includes/script.js"></script>

	<div id="footer">
		<?php if(isset($_SESSION['username'])) :?>
			<h3>Welcome <strong><?php echo $_SESSION['username'] ?></strong></h3>
   		 <?php endif ?>
    	</div>
</body>
</html>