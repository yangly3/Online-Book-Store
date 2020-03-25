<?php include('server.php')?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Log In</title>
<link href="includes/style.css" rel="stylesheet" type="text/css">
<script>
function validation() {
	//alert ("validating!");
	//return false;
	if (document.getElementById('bir').value == '') {
		alert ("you must include a username");
		return false;
	}

	if (document.getElementById('iki').value == '') {
		alert ("you must include a password");
		return false;
	}
	if (document.getElementById('iki').value.length < 4) {
		alert("password must be at least 4 characters in length");
		return false;
	}
return true;
}
</script>
	</head>
	
	<body>
	   
	
	    <div class="top_banner">
			
            <div class="top_logo"><img src="Images/1.jpeg" alt="LOGO" />
			   </div>
         
         <nav class="dropdownmenu">
            <ul>
               <li><a href="Product_View.php">&nbsp;&nbsp;&nbsp;Home&nbsp;&nbsp;&nbsp;</a></li>               
			      <li><a href="ViewMyCart.php">Shopping Cart</a></li>
               <li><a href="CheckOut.html">Check Out</a></li>
			      <li><a href="OrderHistory.html">Order History</a></li>				
            </ul>
         </nav>
			   <a href="1tlogin.php" class="myButton" type="submit" name="login_user">Customer Login</a>
      </div>
      	
	      <form action="1tlogin.php" method="post" onsubmit="return validation();">

		
	   <div id="Loc">
			<br><em>Log in</em><br><br>
	   </div>
		
	   <div class="background">
		   <p>Please Enter Your User Name&Password for log in</p>
		   <div class="userin">
			
            <label for="bir" >Username</label>
            <input  type="text" id="bir" value="" name="username" required>
			
            <label for="iki">Password</label>
            <input  type="password" id="iki" value="" name="password" required><br>
 
	         <button type="submit" class="myButton1" type="submit" name="login_user" >Customer Login<br></button>
      
            <button type="submit" class="sumbit"  type="submit" name="adm_user">Client Login<br></button>
            <?php include('errors.php')  ?>
		      <p>Not a user?<a href="1tregister.php">Click here to register~</a></p> 
			</div>
      </div>
      </form>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="dist/login.js"></script>
	<div id="footer">
      <p class="footer-gd">Not Logged in yet</p>
   </div>
		
</body>
</html>
