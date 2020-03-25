<!doctype html>
<html>
<head>
<title>User Agreement </title>
</head>
<body>
<?php
session_start();
include ('mysqli_connect.php');
echo "Hello! <br>";
echo "USERNAME: ";
echo $_SESSION['username'];

if(isset($_POST['Agree'])) {
	$CustomerName = $_SESSION['username'];
	$qCustomerID = "SELECT CustomerID FROM Customer WHERE CustomerName = '$CustomerName'";
		$result = mysqli_query($dbc,$qCustomerID);
		$row= mysqli_fetch_array($result,MYSQLI_ASSOC);
		$CustomerID = $row['CustomerID'];	
	$qAgree = "INSERT INTO Agreement (CustomerID,AgreeOrNot)
			VALUES('$CustomerID',1)";
	mysqli_query($dbc, $qAgree);
	header("Location: Product_View.php");
}

if(isset($_POST['Decline'])){
	$CustomerName = $_SESSION['username'];
	$qCustomerID = "SELECT CustomerID FROM Customer WHERE CustomerName = '$CustomerName'";
		$result = mysqli_query($dbc,$qCustomerID);
		$row= mysqli_fetch_array($result,MYSQLI_ASSOC);
		$CustomerID = $row['CustomerID'];	
	$qDecline = "DELETE FROM Agreement WHERE CustomerID = '$CustomerID'";
	mysqli_query($dbc, $qDecline);
	session_destroy();
	header("Location: 1tlogin.php");
	
	
}
?>
<form action ="useragreement.php" enctype="multipart/form-data" method="POST">
<h1>User Agreement Terms</h1>
<ul>
<li><b>Information You Give Us:</b> We receive and store any information you enter on our Web site or give us in any other way.</li>
<li><b>Automatic Information:</b> We will store the information while you log into your account eg:date..time.. etc.. .</li>
<li><b>E-mail Communications:</b> We ask for the E-mail address when you make your order to prove our ontime, accurate service.</li>
</ul>

<p>Plese agree these terms to log into the website</p>

<button type="submit" name="Agree" value="1" >Agree<br></button>
<button type="submit" name="Decline" value="0" >Decline<br></button>



</form>
	
</body>
</html>