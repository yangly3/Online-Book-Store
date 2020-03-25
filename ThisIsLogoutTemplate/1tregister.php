<?php include('server.php')?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Register</title>
<link href="includes/style.css" rel="stylesheet" type="text/css">
</head>

<body>	   
	<form action="1tregister.php" method="POST">

		<a href="1tlogin.php" class="myButton" type="submit" name="login_user">Customer Login</a>    

		<div id="Loc">
			<br><em>Registration</em><br><br>
		</div>
		
		<div class="background">
			<p>Please enter your information below to create an Account:</p>
		
			<div class="userin">
				<label for="bir">Username</label>
				<input type="text" id="bir" value="" name="username" required >			
		
				<label for="uc">Password</label>
				<input type="password" id="uc" value="" name="password" required minlength="8" ><br>
				<input type="checkbox" onclick="myFunction()">Show Password
				
				<label for="iki">Email</label>
				<input type="email" id="iki" value="" name="email" required ><br>
				
				<label for="iki">Phone</label>
				<input type="text" id="iki" value="" name="phone" required ><br>
			
				<label for="bl">Address</label>
				<input type="text" id="bl" value="" name="address" ><br>	
       
				<?php include('errors.php')  ?>
				<button type="submit" class="sumbit"  type="submit" name="reg_user">Sumbit<br></button>
      
			<p>Already a user?<a href="1tlogin.php">Click here to Log in~</a></p> 
		</div>

		</div>
    </form>  
	<script>	
		function myFunction() {
			var x = document.getElementById("uc");
			if (x.type === "password") {
				x.type = "text";
			} 
			else {
				x.type = "password";
			}
		}
	</script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="includes/script.js"></script>
	<script src="dist/login.js"></script>
	<div id="footer">
    <p class="footer-gd">Not Logged in yet</p>
    </div>
		
</body>
</html>
