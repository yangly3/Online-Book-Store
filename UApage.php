
	<?php 
	//about jump to user agreement page
	include('mysqli_connect.php');
	session_start();
	if(isset($_SESSION['username'])){
		$CustomerName = $_SESSION['username'];
		$qCustomerID = "SELECT CustomerID FROM Customer WHERE CustomerName = '$CustomerName'";
		$result = mysqli_query($dbc,$qCustomerID);
		$row= mysqli_fetch_array($result,MYSQLI_ASSOC);
		$Customerid = $row['CustomerID'];	
		$qAgreement = "SELECT AgreeOrNot FROM Customer WHERE CustomerID = '$Customerid'";
		$result = mysqli_query($dbc,$qAgreement);
		$row= mysqli_fetch_array($result,MYSQLI_ASSOC);
		$AgreeOrNot = $row['AgreeOrNot'];
		$Date = date("Y-m-d");
		$qDate = "UPDATE Customer SET LastLogin = '$Date' WHERE CustomerID = '$Customerid'";
		
		if($AgreeOrNot == 1){
			mysqli_query($dbc,$qDate);
			header("Location: Product_View.php");
		}
		else{
			header("Location:useragreement1.php");
		}
		/*else if($AgreeOrNot == 1){
			header("Location:Display_Product.php");
		*/
		
	}
	?>
	
	
