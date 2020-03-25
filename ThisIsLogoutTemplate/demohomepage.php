<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title> Welcome to ICS199 Online Book Store </title>
	<link href="includes/style.css" rel="stylesheet" type="text/css">
</head>
	
<body>
	
	<div class="top_banner">
			
        <div class="top_logo"><img src="Images/1.jpeg" alt="LOGO" />
		</div>
 
        <nav class="dropdownmenu">
          	<ul>
               <li><a href="Product_View.php">Home</a></li>               
			   <li><a href="ViewMyCart.php">Shopping Cart</a></li>
               <li><a href="CheckOut.php">Check Out</a></li>
			   <li><a href="OrderHistory.php">Order History</a></li>
				<li><a href="useragreement1.php">User Agreement</a></li>
          	</ul>
       	</nav>
       	<div>
		        <?php
			    session_start();

				if(isset($_SESSION['username'])){
				$CurrentCustomer = $_SESSION['username'];				
				include('mysqli_connect.php');
				$query= "SELECT CustomerID FROM Customer WHERE CustomerName = '$CurrentCustomer'";
				$result = mysqli_query($dbc,$query);
				$row= mysqli_fetch_array($result,MYSQLI_ASSOC);
				$CustomerID = $row['CustomerID'];			
				$rows = mysqli_query($dbc,$query);	
				
				echo  '<a href="1tlogout.php" class="myButton" type="submit">Log Out</a>';
				
				}else{
				echo '<a href="1tlogin.php" class="myButton" type="submit" name="login_user">Customer Login</a>';
				}

		       ?>
         </div>
		<form method="POST" action="Display_Product.php">
        	<select name="category">
				<option value="0">All</option>
		    	<option value="1">Classic</option>
            	<option value="2">Life</option>
            	<option value="3">Science</option>
            	<option value="4">Fiction</option>
            	<option value="5">History</option>                       
			</select>
        	<input type="submit" value="Search" id="Button1">
    	</form>			
			
 	</div>			
	
	<div id="table">
	
	
	<?php
	session_start();
	
	if(isset($_SESSION['username'])){
		$CurrentCustomer = $_SESSION['username'];				

		include('mysqli_connect.php');
		
		$query= "SELECT CustomerID FROM Customer WHERE CustomerName = '$CurrentCustomer'";
		$result = mysqli_query($dbc,$query);
		$row= mysqli_fetch_array($result,MYSQLI_ASSOC);
		$CustomerID = $row['CustomerID'];			
		
	
		$query= "select * from Book";
		$rows = mysqli_query($dbc,$query);	
	
		echo '<table class="tftable" border="1">';
		echo '<tr><th>Book Name</th><th>Picture</th><th>Price</th><th>Description</th><th>AddToCart</th></tr>';
		
		while($row = mysqli_fetch_array($rows,MYSQLI_ASSOC)){
			$BookID =$row['BookID'];
			$BookName =$row['BookName'];
			$ISBNCode =$row['ISBNCode'];
			$Writer1 =$row['Writer1'];
			$Writer2 =$row['Writer2'];
			$Price =$row['Price'];
			$Description =$row['Description'];		
		
			echo "<tr><td>".$BookName.'</td><td><a href="#"><img src="Pics/'.$BookID.'.jpg" alt="book" height="150" width="120"/></a></td>';
			echo '<td>$'.$Price.'</td><td>'.$Description.'</td>';
			echo '<td><form action="AddToCart.php" method="POST">';
				
			echo "<input type='hidden' name='CustomerID' value='$CustomerID'/>";
			echo "<input type='hidden' name='BookID' value='$BookID'/>";
			echo '<input type="submit" value="AddToCart"/></form></td></tr>';
		}
		echo '</table>';
		mysqli_close($dbc);	
	}
	
	else {
		
		include('mysqli_connect.php');
	
		$query= "select * from Book";
		$rows = mysqli_query($dbc,$query);	
	
		echo '<table class="tftable" border="1">';
		
		echo '<tr><th>Book Name</th><th>Picture</th><th>Price</th><th>Description</th></tr>';
		
		while($row = mysqli_fetch_array($rows,MYSQLI_ASSOC)){
			$BookID =$row['BookID'];
			$BookName =$row['BookName'];
			$ISBNCode =$row['ISBNCode'];
			$Writer1 =$row['Writer1'];
			$Writer2 =$row['Writer2'];
			$Price =$row['Price'];
			$Description =$row['Description'];		
		
			echo "<tr><td>".$BookName.'</td><td><a href="#"><img src="Pics/'.$BookID.'.jpg" alt="book" height="150" width="120"/></a></td>';
			echo '<td>$'.$Price.'</td><td>'.$Description.'</td>';			
		}
		echo '</table>';
		mysqli_close($dbc);		
		
	}
	?>					
	</div>

	<div id="footer">
	<?php if(isset($_SESSION['username'])) :?>
	<h3>Welcome <strong><?php echo $_SESSION['username'] ?></strong></h3>
	<?php endif ?>
    </div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="includes/script.js"></script>		
</body>
</html>
