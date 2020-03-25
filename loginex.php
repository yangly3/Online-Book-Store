<!doctype html>
<html>
<head>
<title> Login </title>
<script>
function validation() {
	//alert ("validating!");
	//return false;
	if (document.getElementById('username').value == '') {
		alert ("you must include a username");
		return false;
	}

	if (document.getElementById('password').value == '') {
		alert ("you must include a password");
		return false;
	}
	if (document.getElementById('password').value.length < 4) {
		alert("password must be at least 4 characters in length");
		return false;
	}
return true;
}
</script>
</head>
<?php
include('includes/header.html');

?>
<body>
<form action="loginvars.php" method="POST" onsubmit="return validation();">
<p> USERNAME: <input type="text" name="username" id="username"/></p>
<p> PASSWORD: <input type="password" name="password" id="password"/></p>
<input type="submit" value="SUBMIT"  />
</form>
<?php
include('includes/footer.html');
?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="includes/script.js"></script>
</body>
</html>