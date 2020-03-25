<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>View Cart</title>
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
		<a href="1tlogin.php" class="myButton">Log Out</a>
    </div>
	
	
	<div id="table">
		<?php
			session_start();
			include('mysqli_connect.php');	
			if(isset($_SESSION['username'])){				
				$userName=$_SESSION['username'];
				
				$query ="SELECT CustomerID FROM Customer WHERE CustomerName ='$userName';";
				
				$result = mysqli_query($dbc, $query);	
				$row = mysqli_fetch_array($result,MYSQLI_ASSOC);				
				$CustomerID=$row['CustomerID'];
				
				
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
					 <th>Add To Shopping Cart</th>
					 <th>Remove From Shopping Cart</th>						 					 
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
						 <td>$'.number_format($Price*$Quantity,2).'</td>';
					
					echo '<td><form action="addCartItems.php" method="POST">';	
					echo "<input type='hidden' name='CustomerID' value='$CustomerID'/>";
					echo "<input type='hidden' name='BookID' value='$BookID'/>";
					echo '<input type="submit"  class="add" value="+1"/></form></td>';	
					echo '<td><form action="delCartItems.php" method="POST">';	
					echo "<input type='hidden' name='CustomerID' value='$CustomerID'/>";
					echo "<input type='hidden' name='BookID' value='$BookID'/>";
					echo '<input type="submit"  class="rem" value="-1"/></form></td>';	
					
					echo '</tr>';				
						 
				}
					echo '<td>Total: $'.number_format($Total,2).'</td>';
					echo '<td>HST is: 5%</td>';
					echo '<td>GST is: 7%</td>';
					echo '<td colspan="2">Total Payment: $'.number_format($Total*1.12,2).'</td>';										
					echo '<td><form action="CheckOut.php" method="POST">';					
					echo '<input type="submit"  class="add" value="Checkout"/></form></td>';
					echo '<td><form action="delAllItems.php" method="POST">';	
					echo "<input type='hidden' name='CustomerID' value='$CustomerID'/>";
					echo "<input type='hidden' name='BookID' value='$BookID'/>";
					echo '<input type="submit"  class="rem" value="Clear"/></form></td>';					
				echo '</table>';
				
				//$_SESSION[‘totalAmount’] = $Total;
				mysqli_close($dbc);
			}
		?>
	</div>

	<div id="footer">
		<?php if(isset($_SESSION['username'])) :		
		?>
		
		<h3>Welcome <strong><?php echo $_SESSION['username'] ?></strong></h3>
		<?php endif ?>
    </div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="includes/script.js"></script>
</body>
</html>
