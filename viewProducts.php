<?php  include('process1.php'); ?>
<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$edit_state = true;
    $rec = mysqli_query($db, "SELECT * FROM products WHERE id=$id");
		$record = mysqli_fetch_array($rec);
    $name = $record['name'];
    $barcode = $record['barcode'];
    $id = $record['id'];
    $quantity = $record['quantity'];

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$name = $n['name'];
			$barcode = $n['barcode'];
      $quantity = $n['quantity'];
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
	<title>CRUD: CReate, Update, Delete PHP MySQL</title>
  <link rel="stylesheet" href="styleForAll.css">
</head>
<body>
  <center>
  <h1>My products list</h1>
</center>
    <?php if (isset($_SESSION['msg'])): ?>
      <div class="msg">
        <?php 
          echo $_SESSION['msg']; 
          unset($_SESSION['msg']);
        ?>
      </div>
    <?php endif ?>

	<form method="post" action="process1.php" >
  <?php $results = mysqli_query($db, "SELECT * FROM products"); ?>

<table>
	<thead>
		<tr>
			<th>Name product</th>
      <th>Barcode</th>
			<th>Quantity</th>
			<th colspan="3">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['barcode']; ?></td>
      <td><?php echo $row['quantity']; ?></td>
			<td>
				<a class="edit_btn" href="viewProducts.php?edit=<?php echo $row['id']; ?>">Edit</a>
			</td>
			<td>
				<a class="del_btn" href="process1.php?del=<?php echo $row['id'] ?>">Delete</a>
			</td>
		</tr>
	<?php } ?>
  </tbody>
</table>

<form method="post" action="process1.php">
<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>Name</label>
      <input type="text" name="name" value="<?php echo $name; ?>">
		</div>
		<div class="input-group">
			<label>Barcode</label>
      <input type="text" name="barcode" value="<?php echo $barcode; ?>">
		</div>
    <div class="input-group">
			<label>Quantity</label>
      <input type="text" name="quantity" value="<?php echo $quantity; ?>">
		</div>
		<div class="input-group">
    <?php if ($edit_state == false): ?>
	    <button class="btn" type="submit" name="save" style="background: #556B2F;" >Save</button>
    <?php else: ?>
	    <button class="btn" type="submit" name="update" >Update</button>
    <?php endif ?>
  </div>
	</form>
  <a href="page1.html">
        <button type="button" id="click">Back</button>
    </a>
</body>
</html>