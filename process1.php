<?php 
	session_start();

	// initialize variables
	$name = "";
	$barcode = "";
	$quantity = "";
	$id = 0;
	$edit_state = false;

	$db = mysqli_connect('localhost', 'root', '', 'taken');

	 if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$barcode = $_POST['barcode'];
		$quantity = $_POST['quantity'];

		$query = "INSERT INTO products (name, barcode, quantity) VALUES ('$name', '$barcode', '$quantity')"; 
		mysqli_query($db, $query);
		$_SESSION['msg'] = "Address saved"; 
		header('location: viewProducts.php');
	}


	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$barcode = $_POST['barcode'];
		$quantity = $_POST['quantity'];

		mysqli_query($db, "UPDATE products SET name='$name', barcode='$barcode', quantity='$quantity' WHERE id=$id");
		$_SESSION['msg'] = "Address updated";
		header('location: viewProducts.php');
	}
	if (isset($_GET['del'])) {
		$id = $_GET['del'];
		mysqli_query($db, "DELETE FROM products WHERE id=$id");
		$_SESSION['message'] = "Address deleted!"; 
		header('location: viewProducts.php');
	}
	

	$results = mysqli_query($db, "SELECT * FROM products");
?>