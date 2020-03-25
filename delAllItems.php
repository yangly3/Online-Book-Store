<?php

include('mysqli_connect.php');

$customerID = $_POST['CustomerID'];
$BookID = $_POST['BookID'];
$date = date("Y-m-d");

$queryID ="SELECT * FROM ShoppingCart WHERE CustomerID=$customerID";
$result = mysqli_query($dbc, $queryID);	
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$ShoppingID=$row['ShoppingID'];


$queryDetail ="select * from ShoppingDetail where ShoppingID =$ShoppingID and BookID=$BookID ";

$result = mysqli_query($dbc, $queryDetail);	

$row = mysqli_fetch_array($result,MYSQLI_ASSOC);



$changeDetail = "delete from ShoppingDetail where ShoppingID=$ShoppingID;";

/*echo '<script language="javascript">';
echo 'alert("All the items are deleted!")';
echo '</script>';*/

if (!mysqli_query($dbc,$changeDetail)) {
	echo "error!".mysqli_error($dbc);		
}
else{		
	include('ViewMyCart.php');
}

?>