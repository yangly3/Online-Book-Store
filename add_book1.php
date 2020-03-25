<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add Books</title>
<link href="includes/style.css" rel="stylesheet" type="text/css">
</head>
	
<body>
	<div class="header">
     <p><a href="#">ICS199 G15 Online Book Store</a></p>
     </div>
	
	  <div class="top_banner">
			
          <div class="top_logo"><img src="Images/1.jpeg" alt="LOGO" />
		  </div>
         
          <nav class="dropdownmenu">
          <ul>
               <li><a href="index.html">&nbsp;&nbsp;&nbsp;Home&nbsp;&nbsp;&nbsp;</a></li>
                <li><a href="Sport.html">&nbsp;&nbsp;&nbsp;Sport&nbsp;&nbsp;&nbsp;</a>
				   <ul id="submenu">
                     <li><a href="Sport1.html">Sport1</a></li>
                      <li><a href="Sport2.html">Sport2</a></li>
                     <li><a href="Sport3.html">Sport3</a></li>
                   </ul>
				 </li>
				 
                 <li><a href="History.html">&nbsp;&nbsp;&nbsp;History&nbsp;&nbsp;&nbsp;</a>
                   <ul id="submenu1">
                     <li><a href="History1.html">History</a></li>
                      <li><a href="History2.html">History</a></li>
                     <li><a href="History3.html">History</a></li>
                   </ul>
                 </li>
				 
                <li><a href="News.html">&nbsp;&nbsp;&nbsp;New Arrivals&nbsp;&nbsp;&nbsp;</a>
				   <ul id="submenu2">
                     <li><a href="News1.html">New Arrivals</a></li>
                      <li><a href="News2.html">New Arrivals</a></li>
                     <li><a href="News3.html">New Arrivals</a></li>
					   <li><a href="News4.html">New Arrivals</a></li>
                   </ul>
					</li>
				 
                <li><a href="MyCart.html">&nbsp;&nbsp;&nbsp;My Cart&nbsp;&nbsp;&nbsp;</a>
				   <ul id="submenu3">
                     <li><a href="ViewMyCart.html">View My Cart</a></li>
                      <li><a href="OrderHistory.html">Order History</a></li>
                     <li><a href="CheckOut.html">Check Out</a></li>
                   </ul>				 
				 </li>
          </ul>
       </nav>
			<a href="login.html" class="myButton">Log out</a>
     </div>
	
	<div id="Loc">
			<br><em>Edit Books</em><br><br>
	</div>
		
<div id="middle">
	<div style="float: left; width: 340;" >
	
		<form action ="add_book.php" enctype="multipart/form-data" method="post">
			<table class="tftable-admin" border="1">
				<tr><td>BookID:</td><td><input type="number" name="BookID" id=""></td></tr>	
				<tr><td>BookName</td><td><input type="text" name="BookName" id=""></td></tr>				
				<tr><td>CategoryID:</td><td><input type="number" name="CategoryID" id=""></td></tr>	
				<tr><td>ISBNCode</td><td><input type="text" name="ISBNCode" id=""></td></tr>
				<tr><td>PublishDate:</td><td><input type="date" name="PublishDate" id=""></td></tr>
				<tr><td>Version:</td><td><input type="number" name="Version" id=""></td></tr>	
				<tr><td>Writer1:</td><td><input type="text" name="Writer1" id=""></td></tr>
				<tr><td>Writer2:</td><td><input type="text" name="Writer2" id=""></td></tr>
				<tr><td>Price:</td><td><input type="number" name="Price" id=""></td></tr>
				<tr><td>Description:</td><td><input type="textarea" rows="4" cols="50" name="Description" id=""></td></tr>
				
			</table>
				<input type="hidden" name="MAX_FILE_SIZE" value="300000">
				<p><input type="file" name="the_file"></p>
				<a href="#" class="SubmitResults" input type="submit" value="ADD BOOK">ADD BOOK</a>
		</form>		
	
	
	<div id="footer">
		<p style="color:red;">Welcome!+usernameinhere~~~~~~~~~~~~~~~~~~~~</p>
    </div>
	
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
	
//}

//else{
//	echo  "<h4>You are not logged in. Please <a href='loginex.php'>LOG IN</a></h4>";
//} // END IF for outside IF

//include('includes/footer.html');

?>			
</body>
</html>
