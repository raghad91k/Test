<?php
	include 'dbConnection.php';
	$name=$_POST['name'];
	$barcode=$_POST['barcode'];
	$quantity=$_POST['quantity'];
	$sql = "INSERT INTO `products`( `name`, `barcode`, `quantity`) 
	VALUES ('$name','$barcode','$quantity')";
	if (mysqli_query($db, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($db);
?>
