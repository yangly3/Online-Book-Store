<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Checkout</title>
	<link href="includes/style.css" rel="stylesheet" type="text/css">
</head>
	
<body>
	<div class="top_banner">
			
        <div class="top_logo"><img src="Images/1.jpeg" alt="LOGO"/>
		</div>
        <nav class="dropdownmenu">
          	<ul>
              <li><a href="Product_View.php">Home</a></li>               
			   <li><a href="ViewMyCart.php">Shopping Cart</a></li>
               <li><a href="CheckOut.php">Check Out</a></li>
			   <li><a href="OrderHistory.php">Order History</a></li>				
          	</ul>
       	</nav>
		<div>
		        <?php
			    session_start();

				if(isset($_SESSION['username'])){	
				
				echo  '<a href="1tlogout.php" class="myButton" type="submit">Log Out</a>';
				
				}else{
				echo '<a href="1tlogin.php" class="myButton" type="submit" name="login_user">Customer Login</a>';
				}

		       ?>
         </div>
    </div>
	
	
	<div id="table">
		<?php
			session_start();
			include('mysqli_connect.php');	
			if(isset($_SESSION['username'])){				
				$userName=$_SESSION['username'];				
				
				$query ="SELECT * FROM Customer WHERE CustomerName ='$userName';";
				
				$result = mysqli_query($dbc, $query);	
				$row = mysqli_fetch_array($result,MYSQLI_ASSOC);				
				$CustomerID=$row['CustomerID'];				
				$_SESSION["CustomerID"]=$CustomerID;	
  
				$CustomerName=$row['CustomerName']; 
				$CustomerEmail=$row['CustomerEmail']; 
				$CustomerPhone=$row['CustomerPhone']; 
				$Address=$row['Address']; 
				
				echo "<p><h3>".$CustomerName."</h3></p><br>";
				echo "<p><h3>".$CustomerEmail."</h3></p><br>";
				echo "<p><h3>".$CustomerPhone."</h3></p><br>";
				echo "<p><h3>".$Address."</h3></p><br>";
				
				$query = "select b.BookName, b.BookID, b.Price, d.Quantity, c.shoppingDate 
						 from Book b, ShoppingCart c, ShoppingDetail d 
						 where c.ShoppingID=d.ShoppingID 
							   and d.BookID=b.BookID 
							   and c.CustomerID = $CustomerID;";
							   
				$rows = mysqli_query($dbc,$query);
				echo '<table class="tftable-viewmycart" border="1">';
				echo '<tr><th>Book Name</th>
					 <th>Picture</th>
					 <th>Price</th>
					 <th>Quantity</th>
					 <th>SubTotal</th>
					 <th>Plus Tax</th>
					 </tr>';
				$Total =0 ;	
				while($row = mysqli_fetch_array($rows,MYSQLI_ASSOC)){
			
					$BookID =$row['BookID'];
					$BookName =$row['BookName'];
					$Quantity =$row['Quantity'];
					$Price =$row['Price'];
					//$Date =$row['shoppingDate'] ;		
					$Total =$Total+$Quantity*$Price;
			
					echo "<tr>
						 <td>".$BookName.'</td>
						 <td><a href="#"><img src="Pics/'.$BookID.'.jpg" alt="book" height="150" width="120"/></a></td>
						 <td>$'.$Price.'</td>
						 <td>'.$Quantity.'</td>
						 <td>$'.number_format($Price*$Quantity,2).'</td>
						 <td>$'.number_format($Price*$Quantity*1.12,2).'</td></tr>';		
				}
					echo '<td>Summary:</td>';
					echo '<td>Total: $'.number_format($Total,2).'</td>';
					echo '<td>HST is: 5%</td>';
					echo '<td>GST is: 7%</td>';
					echo '<td>Total Payment: $'.number_format($Total*1.12,2).'</td>';		
					//echo '<td><form action="charge.php" method="POST">';
					//echo "<input type='hidden' name='CustomerID' value='$CustomerID'/>";					
					//echo '<input type="submit"  class="add" value="CheckOut"/></form></td>';				
				echo '</table>';	
				//$Total =round($Total*1.12,2) ;
				mysqli_close($dbc);
			}
		?>
		
		<form action="charge.php" method="post">		
        <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
          data-key=pk_test_L77hrmmDfp5nzUhZMfzSEhCq00QDPdN9DC
          data-description="<?php echo 'Your Payment Form'; ?>"
          data-amount="<?php echo round($Total*1.12,2)*100; ?>"
          data-locale="auto"></script>		 
	    <input type="hidden" name="totalamt" value="<?php echo round($Total*1.12,2)*100; ?>" />
		</form>
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
