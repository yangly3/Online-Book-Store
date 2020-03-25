<html>
<head>

</head>
<body>

<?php
include("includes/header.html");
if (isset($_POST['BookID'])) {
    echo "SUCCESS";
	$BookID = $_POST['BookID'];
	
		//$BookName = $_POST('BookName');
		$ISBNCode = $_POST('ISBNCode');
		/*$PublishDate = $_POST('PublishDate');
		$Version = $_POST('Version');
		$Writer1 = $_POST('Writer1');
		$Writer2 = $_POST('Writer2');
		$Price = $_POST('Price');
		$Description = $_POST('Description');
		echo "post succesfful";*/
	echo "BOOK ID".$BookID;

	
	
} else {

?>		
		<form action ="add_bookM21.php"  method="POST">
		<p>BookID:<input type="text" name= "BookID"></p>
		<p>BookName:<input type="text" name= "BookName"></p>
		<p>ISBNCode:<input type="text" name= "ISBNCode"></p>
		<p>PublishDate:<input type="text" name= "PublishDate"></p>
		<p>Version:<input type="text" name= "Version"></p>
		<p>Writer1:<input type="text" name= "Writer1"></p>
		<p>Writer2:<input type="text" name= "Writer2"></p>
		<p>Price:<input type="text" name= "Price"></p>
		<p>Description:<input type="text" name= "Description"></p>
		
		<input type="hidden" name="MAX_FILE_SIZE" value="300000">
		<p><input type="file" name="the_file"></p>
		
		<input type="submit" value="ADD BOOK">
		</form>
<?php

}
include("includes/footer.html");
?>
</body>
<html>