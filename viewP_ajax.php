<?php
	include 'dbConnection.php';
	$sql = "SELECT * FROM products";
	$result = $db->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
?>	
		<tr>
			<td><?=$row['name'];?></td>
			<td><?=$row['barcode'];?></td>
			<td><?=$row['quantity'];?></td>
		</tr>
		<br>
<?php	
	}
	}
	else {
		echo "0 results";
	}
	mysqli_close($db);
?>
