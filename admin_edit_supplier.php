<!DOCTYPE html>
<html>
<head>
	<title>Update Info</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<center>
<h3>Update information</h3>	
<form action= "admin_view_supplier_backend.php" method="GET" id="edit_supplier">
	<?php
	require_once 'dbconnect.php';

	$supplier_id = $_GET["supplier_id"];
	$name = urldecode($_GET["name"]);
	$address = urldecode($_GET["address"]);

	echo '<input type="hidden" name="identifier" value="2">';
	echo 'supplier_id: <input type="text" name="supplier_id" value="'.$supplier_id.'" readonly><br>';
	echo 'Name: <input type="text" name="name1" value="'.$name.'"><br>';
	echo '</form>';
	echo '<span> Address </span>';
	echo '<textarea rows="4" cols="50" name="address" form="edit_supplier">'.$address.'</textarea>';
	echo '<br>';
	echo '<button type="submit" form="edit_supplier">Edit</button>';
	?>
</center>
</body>
</html>