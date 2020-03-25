
<?php
  session_start();
  include('includes/header.html');
  include('mysqli_connect.php');	
  
  $token  = $_POST['stripeToken'];
  $email  = $_POST['stripeEmail']; 
  $totalamt = $_POST['totalamt'];
  
  $CustomerID =$_POST['CustomerID'];
  $date = date("Y-m-d");
  
  $qCart= "SELECT * FROM ShoppingCart WHERE CustomerID = '$CustomerID'";
  $result = mysqli_query($dbc,$qCart);
  $row= mysqli_fetch_array($result,MYSQLI_ASSOC);
  $ShoppingID=$row['ShoppingID'];
  
  $qInsertOrder= "INSERT INTO OrderInfo(CustomerID,Ordertime) VALUES($customerID,'$date')"; 
  
  if (!mysqli_query($dbc,qInsertOrder)) {
	echo "error!".mysqli_error($dbc);
	echo "Back to home page".mysqli_error($dbc);	
	mysqli_close($dbc);
	exit();
}

  require_once('./config.php');
  

  $token  = $_POST['stripeToken'];
  $email  = $_POST['stripeEmail'];
  $CustomerID =$_POST['CustomerID'];
  $totalamt = $_POST['totalamt'];
  
  echo "Total amt: $totalamt";
  

  
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
  echo '<h3>Successfully charged $'.$amount.' </h3>Thank you for shopping at our online book store';
  // Clear the cart:
  unset($_SESSION['cart']);
  //include ('includes/footer.html'); 
  
  
  
?>