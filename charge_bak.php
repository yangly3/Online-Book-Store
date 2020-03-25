
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
	echo "1.<br>".$queryCart."<br>";	
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
			echo "2.<br>".$insertDetail."<br>";
		}		
  }  
 
  $deleteID ="delete FROM ShoppingCart WHERE ShoppingID=$ShoppingID";   
  
  if (!mysqli_query($dbc,$deleteID )) {
	echo  "Error: Delete From ShoppingCart!".mysqli_error($dbc);
	echo "3.<br>".$deleteID."<br>";	
  }
	
  $deleteDetail="delete FROM ShoppingDetail WHERE ShoppingID=$ShoppingID";    
 
   if (!mysqli_query($dbc,$deleteDetail)) {
	 echo  "Error: Delete From ShoppingDetail!".mysqli_error($dbc);
	 echo "4.<br>".$deleteDetail."<br>";	 
	}  

  /*$queryName="select * from Customer WHERE CustomerID=$CustomerID";
  $result = mysqli_query($dbc, $queryName);	
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $CustomerName=$row['CustomerName'];  
  
  $filename ="/home/student/ics19915/receipt/".$ShoppingID."test.txt";
  if (touch($filename)) {
	$data ="Dear ".$CustomerName.":\n Thanks for shopping at our store.\n Your payment ";  
	//$data ="Dear ".$CustomerName.":\n Thanks for shopping at our store.\n Your payment ".$totalamt." has been approved.";  
    fwrite($filename, $data);
  }*/
	
  mysqli_close($dbc); 
  //include('OrderHistory.php');   
  
 
  require_once('./config.php');

  $token  = $_POST['stripeToken'];
  $email  = $_POST['stripeEmail'];
  
  $totalamt = $_POST['totalamt'];

  $customer = \Stripe\Customer::create(array(
      'email' => $email,
      'source'  => $token
  ));

  $charge = \Stripe\Charge::create(array(
      'customer' => $customer->id,
      'amount'   => $totalamt,
      'currency' => 'cad'
  ));
   

$amount = number_format(($totalamt / 100), 2);  
   echo '<h3>Successfully charged $'.$amount.' </h3><br>Thank you for shopping at our online book store';  
   echo "<a href=\"Product_View.php\">Back To Homepage</a>";
?>