<?php

include('mysqli_connect.php');

$customerID = $_POST['CustomerID'];
$BookID = $_POST['BookID'];
$date = date("Y-m-d");

$queryID ="SELECT * FROM ShoppingCart WHERE CustomerID=$customerID";
$result = mysqli_query($dbc, $queryID);	
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$ShoppingID=$row['ShoppingID'];

/*if ($ShoppingID==null) {
	
	$queryCart = "INSERT INTO ShoppingCart (CustomerID,ShoppingDate,IsValid) VALUES($customerID,'$date',true)";
	mysqli_query($dbc, $queryCart);	

	$queryID ="SELECT * FROM ShoppingCart WHERE CustomerID=$customerID";
	$result = mysqli_query($dbc, $queryID);	
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$ShoppingID=$row['ShoppingID'];	
}*/

$queryDetail ="select * from ShoppingDetail where ShoppingID =$ShoppingID and BookID=$BookID ";

$result = mysqli_query($dbc, $queryDetail);	

$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$Quantity =$row['Quantity'];

$Quantity = $Quantity -1;

if ($Quantity ==0)	{
	$changeDetail = "delete from ShoppingDetail where ShoppingID=$ShoppingID and BookID=$BookID;";
}
else {
	$changeDetail = "update ShoppingDetail set Quantity= $Quantity where ShoppingID=$ShoppingID and BookID=$BookID;";
}

if (!mysqli_query($dbc,$changeDetail)) {
	echo "error!".mysqli_error($dbc);
	echo "Back to home page".mysqli_error($dbc);	
}
else{	
	//$previous = "javascript:history.go(-1)";
	//header('Location:Product_View.php');
	//header('Location:$previous');
	include('ViewMyCart.php');
}

?>