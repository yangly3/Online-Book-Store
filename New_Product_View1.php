<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>
	<link href="newstyle.css" rel="stylesheet" type="text/css">
</head>
	
<body>
	
	<div class="top_banner">
			
        <div class="top_logo"><img src="Images/1.jpeg" alt="LOGO" />
		</div>
 
        <nav class="dropdownmenu">
          	<ul>
               <li><a href="Product_View.php">Home</a></li>               
			   <li><a href="ViewMyCart.php">Shopping Cart</a></li>
               <li><a href="CheckOut.html">Check Out</a></li>
			   <li><a href="OrderHistory.html">Order History</a></li>				
          	</ul>
       	</nav>
		<a href="1tlogin.php" class="myButton">Log In</a>
		<form method="GET" action="Display_Product.php">
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
	
	
	
	<?php
	session_start();
	//include('includes/header.html');

	include('mysqli_connect.php');
	
		$query= "select * from Book";
		$rows = mysqli_query($dbc,$query);	
	
	
		while($row = mysqli_fetch_array($rows,MYSQLI_ASSOC)){
			$BookID =$row['BookID'];
			$BookName =$row['BookName'];
			$ISBNCode =$row['ISBNCode'];
			$Writer1 =$row['Writer1'];
			$Writer2 =$row['Writer2'];
			$Price =$row['Price'];
			$Description =$row['Description'];	
		
		echo '<div class="item">
                    <div class="middle" >
					<div class="thumbnail">
						<div class="item-img">
					<img src="Pics/'.$BookID.'.jpg" alt="book" height="143" width="155"/>
							</div>
					<div class="caption">
					<h4 class="pull-right">Price:'.$Price.'</h4>
					<h4>Book Name:'.$BookName.'</h4>
					<p class="Des">Description:'.$Description.'</p>
					</div>
					<a href="#0" class="add" onclick="AddToCart()">Add</a>
					</div>
				   </div>
	            </div>';
		}

	
		mysqli_close($dbc);	

	?>	
		
	<div class="cd-cart-container empty">
	<a href="#0" class="cd-cart-trigger">
		Cart
		<ul class="count"> <!-- cart items count -->
			<li>0</li>
			<li>0</li>
		</ul> <!-- .count -->
	</a>

	<div class="cd-cart">
		<div class="wrapper">
			<header>
				<h2>Cart</h2>
				<span class="undo">Item removed. <a href="#0">Undo</a></span>
			</header>
			
			<div class="body">
				<ul>
					<!-- products added to the cart will be inserted here using JavaScript -->
				</ul>
			</div>

			<footer>
				<a href="#0" class="checkout btn"><em>Checkout - $<span>0</span></em></a>
			</footer>
		</div>
	</div> <!-- .cd-cart -->
</div> <!-- cd-cart-container -->
	
		
     
	<div id="footerrr">
	<?php if(isset($_SESSION['username'])) :?>
	<h3>Welcome <strong><?php echo $_SESSION['username'] ?></strong></h3>
	<?php endif ?>
    	</div>
	
	<script src="dist/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script src="dist/pwaddcartmain.js"></script> <!-- Resource jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="includes/script.js"></script>		
</body>
</html>
