<!DOCTYPE html>
<html>
<head>
	<title>Update Info</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<center>
<h3>Update information</h3>	
<form action= "admin_view_inventory_backend.php" method="GET">
	<?php
	require_once 'dbconnect.php';

	$inventory_id = $_GET["inventory_id"];
	$medicine_id = $_GET["medicine_id"];
	$quantity = $_GET["quantity"];
	$manufacture_date = $_GET["manufacture_date"];
	$expiry_date = $_GET["expiry_date"];
	$shelf_no = $_GET["shelf_no"];

	echo '<input type="hidden" name="identifier" value="1">';
	echo 'Inventory ID: <input type="text" name="inventory_id1" value="'.$inventory_id.'" readonly><br>';
	echo 'Medicine ID: <input type="text" name="medicine_id1" placeholder="'.$medicine_id.'"><br>';
	echo 'Quantity: <input type="text" name="quantity1" placeholder="'.$quantity.'"><br>';
	echo 'Manufacture Date: <input type="text" name="manufacture_date1" placeholder="'.$manufacture_date.'"><br>';
	echo 'Expiry Date: <input type="text" name="expiry_date1" placeholder="'.$expiry_date.'"><br>';
	echo 'Shelf No: <input type="text" name="shelf_no1" placeholder="'.$shelf_no.'"><br>';

	echo '<button type="submit">Edit</button>';
	?>
</form>
</center>
</body>
</html>