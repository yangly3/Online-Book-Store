
<?php
  session_start();    
  
  include('mysqli_connect.php');
  
  $CustomerID  = $_POST['CustomerID'];  
  $date = date("Y-m-d"); 

  
  $queryID ="SELECT ShoppingID FROM ShoppingCart WHERE CustomerID=$CustomerID";  
  
  $result = mysqli_query($dbc, $queryID);	
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $ShoppingID=$row['ShoppingID'];  
  
  $queryCart = "INSERT INTO OrderInfo (OrderID,CustomerID,Ordertime) VALUES($ShoppingID,$CustomerID, '$date');"; 
  
  if (!mysqli_query($dbc,$queryCart )) {
	echo "Error: Insert into OrderInfo!".mysqli_error($dbc);	
	
  }
 
  $queryDetail ="SELECT * FROM ShoppingDetail WHERE ShoppingID=$ShoppingID";   
  
  $rows = mysqli_query($dbc,$queryDetail);  
  while($row = mysqli_fetch_array($rows,MYSQLI_ASSOC)){	    
		$BookID =$row['BookID'];		
		$Quantity =$row['Quantity'];		
		$insertDetail ="INSERT INTO OrderDetail (OrderID,BookID,Quantity) VALUES ($ShoppingID,$BookID,$Quantity);";
		//echo "BookID is ".$BookID."<br>";
		if (!mysqli_query($dbc,$insertDetail )) {
			echo  "Error: Insert into OrderDetail!".mysqli_error($dbc);				
		}
		
  }
  
 
  $deleteID ="delete FROM ShoppingCart WHERE ShoppingID=$ShoppingID";  
 
  
  if (!mysqli_query($dbc,$deleteID )) {
	echo  "Error: Delete From ShoppingCart!".mysqli_error($dbc);			
  }
	
  $deleteDetail="delete FROM ShoppingDetail WHERE ShoppingID=$ShoppingID";    
 
   if (!mysqli_query($dbc,$deleteDetail)) {
	 echo  "Error: Delete From ShoppingDetail!".mysqli_error($dbc);				
	}   
  
include('OrderHistory.php');
  
  mysqli_close($dbc); 
?>