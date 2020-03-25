<?php
session_start();
include('mysqli_connect.php');
//initialize var
$CustomerName  = "";
$CustomerEmail  = "";
$CustomerPhone  = "";
$Address  = "";
$date = date("Y-m-d");
$errors = array();

//customer register conditions
 if (isset($_POST['reg_user'])){
 $CustomerName  = mysqli_real_escape_string($dbc,$_POST['username']);
 $CustomerEmail  = mysqli_real_escape_string($dbc, $_POST['email']); 
 $Password  = mysqli_real_escape_string($dbc, $_POST['password']); 
 $CustomerPhone  = mysqli_real_escape_string($dbc, $_POST['phone']);
 $address = mysqli_real_escape_string($dbc, $_POST['address']); 

	if (empty($CustomerName )) {array_push($errors, "Username is required111");}
	if (empty($CustomerEmail )) {array_push($errors, "Email is required");}
	if (empty($Password )) {array_push($errors, "Password is required");}
	//if ($password_1 != $password_2) {array_push($errors,"Password do not match");}

	$user_check_query = "SELECT * FROM Customer WHERE CustomerName ='$CustomerName' or CustomerEmail = '$CustomerEmail' LIMIT 1";
	$result = mysqli_query($dbc, $user_check_query);
	$user = mysqli_fetch_assoc($result);
	
	if ($user){
			if ($user['CustomerName']===$CustomerName){array_push($errors, "Username alreay exists");
		}

			if ($user['CustomerEmail']===$CustomerEmail){array_push($errors, "This email id already has a registered username");
			}
	}

	if (count($errors) == 0){
	//$Password  = md5($Password );
    print $Password ;
	$query = "INSERT INTO Customer (CustomerName , Password ,RegisterDate, CustomerEmail,CustomerPhone,Address,AgreeOrNot)
	          VALUES('$CustomerName ','$Password','$date','$CustomerEmail','$CustomerPhone','$address',0)";
			  
	if (!mysqli_query($dbc,$query)) {
	echo "error in ".$query."<br>";
	echo "Back to home page".mysqli_error($dbc);	
	}

	$_SESSION['username'] = $CustomerName ;
	$_SESSION['success'] = "You are now logged in";
	header('location:useragreement1.php');
	}

 }

 
//customer login condition     
if (isset($_POST['login_user'])){
		 $CustomerName  = mysqli_real_escape_string($dbc, $_POST['username']);
		 $Password  = mysqli_real_escape_string($dbc, $_POST['password']);
		 
		 if (empty($CustomerName )) {array_push($errors, "Username is required");}
    	     if (empty($Password )) {array_push($errors, "Password is required");}
		                if (count($errors) == 0){
			$query ="SELECT * FROM Customer WHERE CustomerName ='$CustomerName ' AND Password = '$Password'";
			$results = mysqli_query($dbc, $query);
					if (mysqli_num_rows($results)){
									$_SESSION['username'] = $CustomerName ;
									$_SESSION['success'] = "Logged in successfully";
									//header('location:add_book.php');
									header('location:UApage.php');
					}
					else{array_push($errors, "Wrong username/password, please try again");
					} 
		}
}

//client login conditon
if (isset($_POST['adm_user'])){
		$CustomerName  = mysqli_real_escape_string($dbc, $_POST['username']);
		$Password  = mysqli_real_escape_string($dbc, $_POST['password']);
		if (empty($CustomerName )) {
			array_push($errors, "Username is required");
		}
		if (empty($Password )) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0){
			//$Password  = md5($Password);
		    $query ="SELECT * FROM Client WHERE ClientName ='$CustomerName ' AND Password = '$Password'";
			$results = mysqli_query($dbc, $query);

			if (mysqli_num_rows($results)){
				$_SESSION['username'] = $CustomerName ;
				$_SESSION['success'] = "Logged in successfully";
				
				header('location:add_book.php');
			}
			else{array_push($errors,"Wrong username/password, please try again");
	        } 
		}
}
?>
