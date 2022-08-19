<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	

<?php 
  $db = mysqli_connect("localhost", "root", "", "taken");
 
  
  if (isset($_POST['register'])) {
  	$username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
	$phone = $_POST['phone'];

    $sql_e = "SELECT * FROM users WHERE email='$email'";
  	$res_e = mysqli_query($db, $sql_e) or die(mysqli_error($db));
    
    if (mysqli_num_rows($res_e) > 0) {
  	  $name_error = "Sorry..Email already taken!";	
  	}else{
  	  $query = "INSERT INTO users (username, email, password, phone) 
  	       	VALUES ('$username', '$email', '$password', '$phone')";
  	  $result = mysqli_query($db, $query) or die(mysqli_error($db));
  	  echo "Saved Successfully, Welcome in our Supermarket";
  	  exit();
		
  	}
  }

?>

