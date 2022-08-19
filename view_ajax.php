<?php
	include 'dbConnection.php';
	$sql = "SELECT * FROM users";
	$result = $db->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
?>	
		<tr>
			<td><?=$row['username'];?></td>
			<td><?=$row['email'];?></td>
			<td><?=$row['password'];?></td>
			<td><?=$row['phone'];?></td>
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
