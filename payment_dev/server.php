<?php
session_start();
include('mysqli_connect.php');
//initialize var
$CustomerName  = "";
$CustomerEmail  = "";
$errors = array();

//customer register conditions
 if (isset($_POST['reg_user'])){
 $CustomerName  = mysqli_real_escape_string($dbc,$_POST['username']);
 $CustomerEmail  = mysqli_real_escape_string($dbc, $_POST['email']); 
 $Password  = mysqli_real_escape_string($dbc, $_POST['password']); 
 $address = mysqli_real_escape_string($dbc, $_POST['address']); 

	if (empty($CustomerName )) {array_push($errors, "Username is required111"); echo "<script>alert($errors, 'Username is required111,Please enter your username!');</script>"}
	    
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
	$query = "INSERT INTO Customer (CustomerName , Password , CustomerEmail )
	          VALUES('$CustomerName ', '$Password', '$CustomerEmail')";
	mysqli_query($dbc, $query);

	$_SESSION['username'] = $CustomerName ;
	$_SESSION['success'] = "You are now logged in";
	header('location:1tindex.php');
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
									header('location:Display_Product.php');
					}
					else{array_push($errors,"Wrong username/password, please try again");
					} 
		}
}

//client login conditon
if (isset($_POST['adm_user'])){
		$CustomerName  = mysqli_real_escape_string($dbc, $_POST['username']);
		$Password  = mysqli_real_escape_string($dbc, $_POST['password']);
		if (empty($CustomerName )) {array_push($errors, "Username is required");}
			 if (empty($Password )) {array_push($errors, "Password is required");}

		if (count($errors) == 0){
			//$Password  = md5($Password);
		    $query ="SELECT * FROM Client WHERE ClientName ='$CustomerName ' AND Password = '$Password'";
			$results = mysqli_query($dbc, $query);

			if (mysqli_num_rows($results)){
				$_SESSION['username'] = $CustomerName ;
				$_SESSION['success'] = "Logged in successfully";
				//header('location:add_book.php');
				header('location:add_book.php');
			}
			else{array_push($errors,"Wrong username/password, please try again");
	        } 
		}
}
?>
