<!DOCTYPE html>
<html>
<head>
	<title>Update Info</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<center>
<h3>Add inventory</h3>	
<form action= "admin_view_inventory_backend.php" method="GET">
	<?php

	require_once 'dbconnect.php';

	echo '<input type="hidden" name="identifier" value="2">';
	echo 'Inventory ID: <input type="text" name="inventory_id"><br>';
	echo 'Medicine ID: <input type="text" name="medicine_id"><br>';
	echo 'Quantity: <input type="text" name="quantity"><br>';
	echo 'Manufacture Date: <input type="text" name="manufacture_date"><br>';
	echo 'Expiry Date: <input type="text" name="expiry_date"><br>';
	echo 'Shelf No: <input type="text" name="shelf_no"><br>';
	echo '<button type="submit">Add inventory</button>';
	?>
</form>
</center>
</body>
</html>